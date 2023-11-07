<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseTimelineChild extends Model
{
	protected $table = 'course_timeline_children';
    use SoftDeletes;
     
    protected $fillable = [
    	'study_period_id',
    	'name',
		'status',
	];

	protected $dates = ['deleted_at'];

	public function parent(){
        return $this->belongsTo(CourseTimeline::class,'study_period_id','id');
    }
}
