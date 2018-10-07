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
      $table->phone_verification_code = $this->generateNumber();
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

      return view('verifikasi');
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

    public function tenor(Request $request){
      $id = $request->input('id');
      $model = $request->input('model_id');
      $variant = $request->input('variant_id');
      $transmission = $request->input('transmission_id');
      $matchThese = ['specimen_id' => $model, 'variant' => $variant, 'transmission' => $transmission, 'tenor' => $id];
      $regencies = Car::where($matchThese)->get();
      return response()->json($regencies);
    }

    public function fuel(Request $request){
      $id = $request->input('id');
      $model = $request->input('model_id');
      $variant = $request->input('variant_id');
      $transmission = $request->input('transmission_id');
      $tenor = $request->input('tenor_id');
      $matchThese = ['specimen_id' => $model, 'variant' => $variant, 'transmission' => $transmission, 'tenor' => $tenor, 'fuel' => $id];
      $regencies = Car::where($matchThese)->get();
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
