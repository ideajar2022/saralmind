<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudyPeriod extends Model
{
    use SoftDeletes;
     
    protected $fillable = [
    	'name',
		'status'
	];

	protected $dates = ['deleted_at'];

    public function children(){
    	return $this->hasMany(StudyPeriodChild::class,'study_period_id');
    }
}
