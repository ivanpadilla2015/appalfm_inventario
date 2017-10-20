<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    protected $fillable = ['nombrelement'];


    public function detalle()
    {
        return $this->hasOne('App\Detalle');
    }
}

