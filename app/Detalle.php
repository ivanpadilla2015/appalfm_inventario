<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
    protected $fillable = ['inventario_id','user_id', 'element_id', 'marca', 'modelo', 'serial', 'num_activo', 'fechadquirido', 'cantidad','estado'];



    public function element()
	{
		return $this->belongsTo('App\Element');
	}
}

