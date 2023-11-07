<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
	use SoftDeletes;
	
	protected $fillable = [
		'module_id',
		'name',
		'slug',
	];

	public function module(){
        return $this->belongsTo(Module::class,'module_id','id');
    }
	
    public function roles() {
	   return $this->belongsToMany(Role::class,'roles_permissions');  
	}

	public function admins() {
	   return $this->belongsToMany(Admin::class,'admins_permissions');
	}
}
