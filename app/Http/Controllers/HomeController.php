<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Mail;
use DB;
use App\Specimen;
use App\Car;
use App\User;
use App\About;
use App\Price;
use App\CarImage;
use App\Promo;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //   $this->middleware(['auth', 'verified']);
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('home');
    }

    public function home()
    {
      return redirect('/');
    }

    public function generateNumber() {
      $number = rand(1001,9999);
      if ($this->numberExists($number)) {
        return generateNumber();
      }
      return $number;
    }

    public function numberExists($number) {    
      return User::where('phone_verification_code', $number)->exists();
    }

    public function generateToken() {
      $number = str_random(12);
      if ($this->tokenExists($number)) {
        return generateToken();
      }
      return $number;
    }

    public function tokenExists($number) {    
      return User::where('email_verification_token', $number)->exists();
    }

    public function form_data(Request $request)
    {
      $table = new User;
      $table->name = $request->input('name');
      $nm = $table->name;
      $table->email = $request->input('email');
      $ml = $table->email;
      $str = str_random(8);
      $table->password = Hash::make($str);
      $table->phone_number = $request->input('phone_number');
      $table->voucher_code = $request->input('voucher_code');
      $vc = $this->generateNumber();
      $table->phone_verification_code = $vc;
      $table->email_verification_token = $this->generateToken();
      $tkn = $table->email_verification_token;
      $table->save();

      $data = array(
        'name' => $nm,
        'password' => $str,
        'url' => "https://mobilngetop.com/register/".$tkn
      );
      Mail::send('mails.send', $data, function($message) use ($nm,$ml) {
        $message->to($ml, $nm)->subject
        ('Selamat Datang di Mobil Ngetop');
        $message->from('no-reply@mobilngetop.com','Admin Mobil Ngetop');
      });

      $apikey      = 'b1a958010bbdcf934345e441c04a966a';
      $ipserver    = 'http://45.32.118.255';
      $callbackurl = '';

      $senddata = array(
        'apikey' => $apikey,  
        'callbackurl' => $callbackurl, 
        'datapacket'=>array()
      );

      $number1=$request->input('phone_number');
      $message1='Mobilngetop - '.$vc.' adalah kode verifikasi keamanan. PENTING: Demi keamanan akun Anda, mohon tidak menyebarkan kode ini kepada siapa pun.';
      $sendingdatetime1 =""; 
      array_push($senddata['datapacket'],array(
        'number' => trim($number1),
        'message' => urlencode(stripslashes(utf8_encode($message1))),
        'sendingdatetime' => $sendingdatetime1));

      $dt=json_encode($sendata);
      $curlHandle = curl_init($ipserver."/sms/api_sms_reguler_send_json.php");
      curl_setopt($curlHandle, CURLOPT_CUSTOMREQUEST, "POST");
      curl_setopt($curlHandle, CURLOPT_POSTFIELDS, $dt);
      curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($curlHandle, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($dt)));
      curl_setopt($curlHandle, CURLOPT_TIMEOUT, 5);
      curl_setopt($curlHandle, CURLOPT_CONNECTTIMEOUT, 5);
      $hasil = curl_exec($curlHandle);
      $curl_errno = curl_errno($curlHandle);
      $curl_error = curl_error($curlHandle);  
      $http_code  = curl_getinfo($curlHandle, CURLINFO_HTTP_CODE);
      curl_close($curlHandle);
      if ($curl_errno > 0) {
        $senddata = array(
          'sending_respon'=>array(
            'globalstatus' => 90, 
            'globalstatustext' => $curl_errno."|".$http_code)
        );
        $hasil=json_encode($senddata);
      } else {
        if ($http_code<>"200") {
          $senddata = array(
            'sending_respon'=>array(
              'globalstatus' => 90, 
              'globalstatustext' => $curl_errno."|".$http_code)
          );
          $hasil= json_encode($senddata); 
        } 
      }
      return $hasil;

      // return view('verifikasi');
    }

    public function token($token)
    {
      if (User::where('email_verification_token', $token)->exists()) {
        $data['user'] = User::where('email_verification_token', $token)->value('id');
        return view('register')->with($data);
      }

      abort(404);
    }

    public function chgpwd(Request $request)
    {
      if ($request->input('password') !== $request->input('confirm_password'))
      {
        return back()->with('message', 'Password tidak sama');
      }      
      $table = User::find($request->input('id'));
      $table->password = Hash::make($request->input('password'));
      $role = $table->role_id;
      $table->role_id = $role + 1;
      $table->save();      
    }

    public function privacyPolicy()
    {
      $data['privacy_policies'] = About::where('type', '1')->orderBy('created_at', 'asc')->get();
      return view('privacy_policy')->with($data);
    }

    public function faq()
    {
      $data['faqs'] = About::where('type', '2')->orderBy('created_at', 'asc')->get();
      return view('faq')->with($data);
    }

    public function aboutUs()
    {
      $data['abouts'] = About::where('type', '3')->orderBy('created_at', 'asc')->get();
      return view('about_us')->with($data);
    }

    public function promo()
    {
      $data['promos'] = Promo::all();
      $data['about_promos'] = About::where('type', '4')->orderBy('created_at', 'asc')->get();
      return view('member.promo')->with($data);
    }

    public function p()
    {
      return view('test');
    }

    public function pn(Request $request)
    {      
      ob_start();
      $apikey      = '3f98d8978b971272f0c587eebfccf45e';
      $urlserver   = 'http://45.32.118.255/sms/api_sms_otp_send_json.php';
      $callbackurl = '';
      $senderid    = '1';

      $senddata = array(
        'apikey' => $apikey,  
        'callbackurl' => $callbackurl, 
        'senderid' => $senderid, 
        'datapacket'=>array()
      );

      $number='+6285893567552';
      $message='udeh mandi blon?';
      array_push($senddata['datapacket'],array(
        'number' => trim($number),
        'message' => $message
      ));

      $data=json_encode($senddata);
      $curlHandle = curl_init($urlserver);
      curl_setopt($curlHandle, CURLOPT_CUSTOMREQUEST, "POST");
      curl_setopt($curlHandle, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($curlHandle, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data))
    );
      curl_setopt($curlHandle, CURLOPT_TIMEOUT, 30);
      curl_setopt($curlHandle, CURLOPT_CONNECTTIMEOUT, 30);
      $respon = curl_exec($curlHandle);

      $curl_errno = curl_errno($curlHandle);
      $curl_error = curl_error($curlHandle);  
      $http_code  = curl_getinfo($curlHandle, CURLINFO_HTTP_CODE);
      curl_close($curlHandle);
      if ($curl_errno > 0) {
        $senddatax = array(
          'sending_respon'=>array(
            'globalstatus' => 90, 
            'globalstatustext' => $curl_errno."|".$http_code)
        );
        $respon=json_encode($senddatax);
      } else {
        if ($http_code<>"200") {
          $senddatax = array(
            'sending_respon'=>array(
              'globalstatus' => 90, 
              'globalstatustext' => $curl_errno."|".$http_code)
          );
          $respon= json_encode($senddatax); 
        }
      }   
      header('Content-Type: application/json');
      echo $respon;

    }

    public function select(Request $request)
    {
      $brand_id = $request->input('brand_id');        
      $models = Specimen::where('brand_id',$brand_id)->orderBy('name', 'asc')->get();
      $output = '<option value="">Select</option>';
      foreach ($models as $model) {
        $output .= '<option value="'.$model->id.'">'.$model->name.'</option>';
      }
      echo $output;
    }

    public function regencies(Request $request){
      $id = $request->input('id');
      $regencies = Specimen::where('brand_id', '=', $id)->get();
      return response()->json($regencies);
    }

    public function model(Request $request){
      $id = $request->input('id');
      $regencies = Car::where('specimen_id', '=', $id)->get();
      return response()->json($regencies);
    }

    public function variant(Request $request){
      $id = $request->input('id');
      $model = $request->input('model_id');
      $matchThese = ['specimen_id' => $model, 'variant' => $id];
      $regencies = Car::where($matchThese)->get();
      return response()->json($regencies);
    }

    public function transmission(Request $request){
      $id = $request->input('id');
      $model = $request->input('model_id');
      $variant = $request->input('variant_id');
      $matchThese = ['specimen_id' => $model, 'variant' => $variant, 'transmission' => $id];
      $regencies = Car::where($matchThese)->get();
      return response()->json($regencies);
    }

    public function fuel(Request $request){
      $id = $request->input('id');
      $model = $request->input('model_id');
      $variant = $request->input('variant_id');
      $transmission = $request->input('transmission_id');
      $matchThese = ['specimen_id' => $model, 'variant' => $variant, 'transmission' => $transmission, 'fuel' => $id];
      $regencie = Car::where($matchThese)->value('id');
      $regencies = Price::where('car_id', $regencie)->get();
      $images = CarImage::where('car_id', $regencie)->get();
      return response()->json($regencies);
    }

    public function image(Request $request){
      $id = $request->input('id');
      $model = $request->input('model_id');
      $variant = $request->input('variant_id');
      $matchThese = ['specimen_id' => $model, 'variant' => $variant, 'transmission' => $id];      
      $regencie = Car::where($matchThese)->value('id');
      $images = CarImage::where('car_id', $regencie)->orderBy('created_at', 'asc')->get();
      return response()->json($images);
    }

    public function src(Request $request){
      $id = $request->input('id');                  
      $images = CarImage::find($id);
      return response()->json($images);
    }

    public function firstSrc(Request $request){
      $id = $request->input('id');
      $model = $request->input('model_id');
      $variant = $request->input('variant_id');
      $matchThese = ['specimen_id' => $model, 'variant' => $variant, 'transmission' => $id];
      $regencie = Car::where($matchThese)->value('id');
      $images = CarImage::where('car_id', $regencie)->orderBy('created_at', 'asc')->first();
      return response()->json($images);
    }

    public function tenor(Request $request){
      $id = $request->input('id');      
      $matchThese = ['tenor' => $id];
      $regencies = Price::where('id', $matchThese)->get();
      return response()->json($regencies);
    }

    function states( Request $request )
    {        
      $states = App\Specimen::where('brand_id', $request->get('id') )->get();      
      $output = [];
      foreach( $states as $state )
      {
        $output[$state->id] = $state->name;
      }
      return $output;
    }

    function cities( Request $request )
    {        
      $cities = App\Car::where('state_id', $request->get('id') )->get();
      $output = [];
      foreach( $cities as $city )
      {
        $output[$city->id] = $city->name;
      }
      return $output;
    }
  }
