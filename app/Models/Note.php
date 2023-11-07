<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note extends Model
{
    const ELASTIC_INDEX = 'notes';
    const ELASTIC_TYPE  = 'note';
    use SoftDeletes;
    
    protected $fillable = [
    	'program_id',
        'faculty_id',
    	'grade_id',
    	'subject_id',
    	'unit_id',
    	'lesson_id',
		'title',
		'slug',
		'description',
		'summary',
		'things_to_remember',
		'image',
		'created_by',
		'counter',
        'meta_keyword',
        'meta_title',
		'meta_description',
		'order',
		'status',
		'product_type'
	];

    protected $dates = ['deleted_at'];
    protected $appends = ['image_url','thumbnail_url'];


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

    public function lesson(){
        return $this->belongsTo(Lesson::class, 'lesson_id');
    }

    public function videos(){
        return $this->hasMany(NoteVideo::class,'note_id');
    }

    public function mcqs(){
        return $this->hasMany(NoteObjectiveQuestion::class,'note_id');
    }

    public function exercises(){
        return $this->hasMany(NoteSubjectiveQuestion::class,'note_id');
    }

    public function admin(){
        return $this->belongsTo(Admin::class, 'created_by');
    }

    public function getImageUrlAttribute()
    {
        return $this->image;
        if ($this->image) {
            return asset( config('uploads.directory')['note'].'/'. $this->image);
        } 
        return asset('frontend/img/new-img/for-teachers.jpg');
    }

    public function getThumbnailUrlAttribute()
    {
        if ($this->image) {
            return asset( config('uploads.directory')['note'].'/thumbs/'. $this->image);
        } 
        return asset('frontend/img/new-img/for-teachers.jpg');
    }

    protected $casts = [
        'updated_by' => 'array',
    ];
}
