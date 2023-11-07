<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grade extends Model
{

    use SoftDeletes;
	
    protected $fillable = [
    	'program_id',
        'faculty_id',
		'name',
		'slug',
		'code',
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

	protected $appends 	= ['image_url'];

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset( config('uploads.directory')['grade'].'/'. $this->image);
        } 
        return asset('image/no-image.png');
    }

    public function studyPeriodParent(){
        return $this->belongsTo(StudyPeriod::class,'study_period_parent_id','id');
    }

    public function studyPeriodChild(){
        return $this->belongsTo(StudyPeriodChild::class,'study_period_child_id','id');
    }

    public function program(){
        return $this->belongsTo(Program::class,'program_id','id');
    }

    public function faculty(){
        return $this->belongsTo(Faculty::class,'faculty_id','id');
    }

    public function subjects(){
        return $this->hasMany(Subject::class,'grade_id');
    }

    public function admin(){
        return $this->belongsTo(Admin::class, 'created_by');
    }
}
