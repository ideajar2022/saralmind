<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NoteSubjectiveQuestion extends Model
{
	use SoftDeletes;

    protected $fillable = [
    	'note_id',
    	'question',
    	'answer',
    	'marks',
    	'created_by',
		'type',
		'status',
		'difficulty_level',
	];


    public function note(){
        return $this->belongsTo(Note::class,'note_id');
    }

    public function admin() {
        return $this->belongsTo(Admin::class, 'created_by');
    }

    protected $casts = [
        'updated_by' => 'array',
    ];
}
