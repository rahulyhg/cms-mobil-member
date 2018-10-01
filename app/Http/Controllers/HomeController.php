<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Specimen;
use App\Car;

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
