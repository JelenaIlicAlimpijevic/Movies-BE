<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    //protected $fillable = ['name', 'director', 'image_url', 'duration', 'relase_date', 'generes'];

    public function setGenreAtribute($value)
    {
        $this->attributes['generes'] = json_encode($value);
    }

    public function getGenreAtribute($value) {
        return json_decode($value, true);
	}

	public function search(Request $request){
	$name = $request->input('name');
         $result = Movie::where('name', '=', $name)
            ->get();

        return $result;    }

}