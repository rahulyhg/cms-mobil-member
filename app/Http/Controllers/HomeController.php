<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use DB;
use App\Specimen;
use App\Car;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
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
      $table->email = $request->input('email');
      $table->password = Hash::make(str_random(8));
      $table->phone_number = $request->input('phone_number');
      $table->voucher_code = $request->input('voucher_code');      
      $table->phone_verification_code = $this->generateNumber();
      $table->email_verification_token = $this->generateToken();
      $table->save();

      $objSend = new \stdClass();
      $objSend->demo_one = 'Demo One Value';
      $objSend->demo_two = 'Demo Two Value';
      $objSend->sender = 'SenderUserName';
      $objSend->receiver = 'ReceiverUserName';

      \Mail::to("abdllhhafizh@gmail.com")->send(new SendMail($objSend));


      return view('verifikasi');
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
