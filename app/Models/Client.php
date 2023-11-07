<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;

	public function advertisements(){
	    return $this->hasMany(Advertisement::class,'client_id');
	}
}
