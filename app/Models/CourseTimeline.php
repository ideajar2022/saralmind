<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseTimeline extends Model
{
    use SoftDeletes;
     
    protected $fillable = [
        'name',
        'status'
    ];

    protected $dates = ['deleted_at'];

    public function children(){
        return $this->hasMany(CourseTimelineChild::class,'study_period_id');
    }
}
