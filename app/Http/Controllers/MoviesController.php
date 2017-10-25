<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;


class MoviesController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	$r= $request->query('name');
       return Movie::where('name', 'LIKE', '%' . $r . '%')->get();
   }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
       

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$request->validate(
            [
                'name' => 'required|unique:movies,name',
                'director' => 'required ',
                'duration' => 'required | between:1,500',
                'relase_date' => 'required|unique:movies,relase_date',
                'image_url'=>'url'
            ]);


        $movie= new Movie;
        $movie->name=$request->name;
        $movie->director=$request->director;
        $movie->image_url=$request->image_url;
        $movie->duration=$request->duration;
        $movie->relase_date=$request->relase_date;
        $movie->generes=$request->generes;
    

        $movie->save();
        return $movie;
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $movie=Movie::find();
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
        $movie=Movie::findOrfail($id);
        $movie->name=$request->input('name');
        $movie->director=$request->input('last_name');
        $movie->image_url=$request->input('image_url');
        $movie->duration=$request->input('duration');
        $movie->relase_date=$request->input('relase_date');
        $movie->generes=$request->input('generes'); 

        $movie->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie=Contact::find($id);
        $movie->delete();

        return $movie;
    }

}
