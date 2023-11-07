<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faculty extends Model
{
    protected $table = 'faculties';
    use SoftDeletes;
    
    protected $fillable = [
        'study_period_parent_id',
        'study_period_child_id',
        'program_id',
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

    protected $appends  = ['image_url'];

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset( config('uploads.directory')['faculty'].'/'. $this->image);
        }
        return asset('frontend/img/new-img/for-teachers.jpg');
    }

    public function getThumbnailUrlAttribute()
    {
        if ($this->image) {
            return asset( config('uploads.directory')['faculty'].'/thumbs/'. $this->image);
        }
        return asset('frontend/img/new-img/for-teachers.jpg');
    }

    public function studyPeriodParent(){
        return $this->belongsTo(CourseTimeline::class,'study_period_parent_id','id');
    }

    public function studyPeriodChild(){
        return $this->belongsTo(CourseTimelineChild::class,'study_period_child_id','id');
    }

    public function program(){
        return $this->belongsTo(Program::class,'program_id','id');
    }

    public function grades(){
        return $this->hasMany(Grade::class,'faculty_id');
    }

    public function admin(){
        return $this->belongsTo(Admin::class, 'created_by');
    }
}
