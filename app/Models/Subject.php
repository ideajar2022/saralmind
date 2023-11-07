<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use SoftDeletes;

    protected $fillable = [
    	'program_id',
        'faculty_id',
    	'grade_id',
		'name',
		'slug',
        'image',
		'code',
		'description',
		'status',
        'is_reused',
		'product_type',
		'order',
		'created_by',
        'meta_keyword',
        'meta_title',
        'meta_description',
	];

    protected $dates = ['deleted_at'];
    protected $appends = ['image_url','thumbnail_url'];

    public function program(){
        return $this->belongsTo(Program::class,'program_id');
    }

    public function faculty(){
        return $this->belongsTo(Faculty::class,'faculty_id');
    }

    public function grade(){
        return $this->belongsTo(Grade::class,'grade_id');
    }

    public function units(){
        return $this->hasMany(Unit::class,'subject_id');
    }

    public function lessons(){
        return $this->hasMany(Lesson::class,'subject_id');
    }

    public function admin(){
        return $this->belongsTo(Admin::class,'created_by');
    }

    public function notes()
    {
        return $this->hasManyThrough(Note::class,Lesson::class);
    }


    public function getVideoCountAttribute($value)
    {
        $videos = $this->notes()->withCount('videos')->get();
        $count = 0;
        foreach ($videos as $video){
            $count+=$video->videos_count;
        }
        return $count;
    }

    public function getExerciseCountAttribute($value)
    {
        $exercises = $this->notes()->withCount('exercises')->get();
        $count = 0;
        foreach ($exercises as $exercise){
            $count+=$exercise->exercises_count;
        }
        return $count;
    }

    public function getMcqsCountAttribute($value)
    {
        $mcqs = $this->notes()->withCount('mcqs')->get();
        $count = 0;
        foreach ($mcqs as $mcq){
            $count+=$mcq->mcqs_count;
        }
        return $count;
    }

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset( config('uploads.directory')['subject'].'/'. $this->image);
        }
        return asset('frontend/img/new-img/for-teachers.jpg');
    }

    public function getThumbnailUrlAttribute()
    {
        if ($this->image) {
            return asset( config('uploads.directory')['subject'].'/thumbs/'. $this->image);
        }
        return asset('frontend/img/new-img/for-teachers.jpg');
    }

    public function notesCount(){
        $lessons = $this->lessons()->withCount('notes')->get();
        $notesCount = 0;
        foreach ($lessons as $key => $lesson) {
            $notesCount += $lesson->notes_count;
        }

        return $notesCount;
    }

}
