<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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
        $models = App\Model::where('brand_id',$brand_id)->orderBy('name', 'asc')->get();
        $output = '<option value="">Select</option>';
        foreach ($models as $model) {
            $output .= '<option value="'.$model->id.'">'.$model->name.'</option>';
        }
        echo $output;
    }
}
