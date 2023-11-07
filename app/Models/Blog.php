<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;

    protected $fillable = [
    	'created_by',
    	'title',
    	'description',
    	'summary',
    	'image',
    	'category_id',
    	'slug',
    	'total_hit',
    	'source_url',
    	'video_key',
    	'status',
        'meta_keyword',
        'meta_title',
        'meta_description',
    ];

	protected $dates = ['deleted_at'];
    protected $appends = ['image_url','thumbnail_url'];

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset( config('uploads.directory')['blog'].'/'. $this->image);
        } 
        return asset('frontend/img/new-img/for-teachers.jpg');
    }

    public function getThumbnailUrlAttribute()
    {
        if ($this->image) {
            return asset( config('uploads.directory')['blog'].'/thumbs/'. $this->image);
        } 
        return asset('frontend/img/new-img/for-teachers.jpg');
    }


	public function category()
    {
        return $this->belongsTo(BlogCategory::class,'category_id');
    }

    public function admin(){
        return $this->belongsTo(Admin::class, 'created_by');
    }

}
