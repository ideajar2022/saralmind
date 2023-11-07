<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
    	'program_id',
        'faculty_id',
    	'grade_id',
    	'subject_id',
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

    protected $appends = ['image_url'];

    public function program(){
        return $this->belongsTo(Program::class,'program_id');
    }

    public function faculty(){
        return $this->belongsTo(Faculty::class,'faculty_id');
    }

    public function grade(){
        return $this->belongsTo(Grade::class,'grade_id');
    }

    public function subject(){
        return $this->belongsTo(Subject::class,'subject_id');
    }

    public function lessons(){
        return $this->hasMany(Lesson::class,'unit_id');
    }

    public function admin(){
        return $this->belongsTo(Admin::class,'created_by');
    }

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset( config('uploads.directory')['unit'].'/'. $this->image);
        } 
        return asset('image/no-image.png');
    }

}
