<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategory extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
    	'created_by',
    	'name',
    	'slug',
    	'status',
	];

    protected $dates = ['deleted_at'];

    public function blogs(){
	    return $this->hasMany(Blog::class,'category_id');
	}
}
