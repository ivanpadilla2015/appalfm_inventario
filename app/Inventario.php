<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Inventario extends Model
{
    

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function dependen()
	{
		return $this->belongsTo('App\Dependen');
	}


}
