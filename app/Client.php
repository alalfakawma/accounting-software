<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function purchases() {
    	return $this->hasMany('App\Purchase');
    }
}
