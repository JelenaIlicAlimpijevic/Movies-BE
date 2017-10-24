<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = ['name', 'director', 'image_url', 'duration', 'relase_date', 'generes'];

    public function setGenre($value)
    {
        $this->attributes['generes'] = json_encode($value);
    }

    public function getGenre($value) {
        return json_decode($value, true);
	}
}