<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partner extends Model
{
    use SoftDeletes;
	
    protected $fillable = [
		'name',
		'slug',
		'image',
		'url',
		'description',
		'status',
		'order',
		'created_by'
	];

	protected $dates 	= ['deleted_at'];
	protected $appends 	= ['image_url'];

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset( config('uploads.directory')['partner'].'/'. $this->image);
        } 
        return asset('frontend/img/new-img/for-teachers.jpg');
    }
}
