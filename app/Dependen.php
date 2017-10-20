<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dependen extends Model
{
    protected $fillable = ['nombredepen'];


    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function inventario()
    {
        return $this->hasOne('App\Inventario');
    }

}
