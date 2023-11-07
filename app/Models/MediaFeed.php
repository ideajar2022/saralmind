<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MediaFeed extends Model
{
	use SoftDeletes;
	
    protected $fillable = [
		'title',
		'media',
		'url',
		'image',
		'description',
		'status',
		'order',
		'created_by',
		'published_at'
	];

	protected $dates 	= ['deleted_at'];
	protected $appends 	= ['image_url'];

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset( config('uploads.directory')['media-feed'].'/'. $this->image);
        } 
        return asset('image/no-image.png');
    }
}
