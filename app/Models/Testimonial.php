<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimonial extends Model
{
    use SoftDeletes;
	
    protected $fillable = [
		'name',
		'slug',
		'image',
		'position',
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
            return asset( config('uploads.directory')['testimonial'].'/'. $this->image);
        } 
        return asset('image/no-image.png');
    }
}
