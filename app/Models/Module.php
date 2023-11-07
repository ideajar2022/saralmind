<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Module extends Model
{
	use SoftDeletes;
	
    protected $fillable = [
		'name',
		'slug',
	];
	
	public function permissions(){
        return $this->hasMany(Permission::class,'module_id');
    }
}
