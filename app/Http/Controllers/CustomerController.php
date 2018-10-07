<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Specimen;
use App\Car;
use App\User;
use App\Article;

class CustomerController extends Controller
{
    public function car()
    {
        $data['brands'] = Brand::orderBy('name', 'asc')->get();
        // $brand_id = Brand::orderBy('name', 'asc')->first()->value('id');
        // $data['models'] = Specimen::where('brand_id', $brand_id)->orderBy('name', 'asc')->get();
        // $model_id = Specimen::where('brand_id', $brand_id)->orderBy('name', 'asc')->first()->value('id');
        // $data['cars'] = Car::where('specimen_id', $model_id)->orderBy('name', 'asc')->get();
        // $car_id = Car::where('specimen_id', $model_id)->orderBy('name', 'asc')->first()->value('id');
        return view('member.car')->with($data);
    }

    public function account()
    {
        return "akun";
    }

    public function article()
    {
        $first = Article::orderBy('created_at', 'desc')->first()->value('id');
        $data['first'] = Article::find($first);
        $data['articles'] = Article::where('id', '!=', $first)->orderby('created_at', 'desc')->paginate(3);
        return view('member.article')->with($data);
    }

    public function showArticle($id)
    {        
        $data['first'] = Article::find($id);
        $data['articles'] = Article::where('id', '!=', $id)->orderby('created_at', 'desc')->paginate(3);
        return view('member.showArticle')->with($data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
