<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
    	'program_id',
        'faculty_id',
    	'grade_id',
    	'subject_id',
    	'unit_id',
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
    protected $appends = ['image_url','thumbnail_url'];

    public function admin(){
        return $this->belongsTo(Admin::class, 'created_by');
    }

    public function program(){
    	return $this->belongsTo(Program::class, 'program_id');
    }

    public function faculty(){
        return $this->belongsTo(Faculty::class, 'faculty_id');
    }

    public function grade(){
        return $this->belongsTo(Grade::class, 'grade_id');
    }

    public function subject(){
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function unit(){
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    public function notes(){
        return $this->hasMany(Note::class,'lesson_id');
    }

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset( config('uploads.directory')['lesson'].'/'. $this->image);
        } 
        return asset('frontend/img/new-img/for-teachers.jpg');
    }

    public function getThumbnailUrlAttribute()
    {
        if ($this->image) {
            return asset( config('uploads.directory')['lesson'].'/thumbs/'. $this->image);
        } 
        return asset('frontend/img/new-img/for-teachers.jpg');
    }
}
