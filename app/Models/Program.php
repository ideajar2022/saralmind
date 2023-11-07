<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    use SoftDeletes;
	
    protected $fillable = [
		'name',
		'slug',
		'image',
		'description',
		'status',
		'product_type',
		'order',
		'created_by',
		'meta_keyword',
        'meta_title',
		'meta_description',
	];

	protected $dates = ['deleted_at'];

    public function faculties(){
        return $this->hasMany(Faculty::class,'program_id')->orderBy('order','asc');
    }

     public function admin(){
        return $this->belongsTo(Admin::class, 'created_by');
    }
}
