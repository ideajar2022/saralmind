<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NoteObjectiveQuestion extends Model
{
    use SoftDeletes;

    protected $fillable = [
    	'note_id',
    	'question',
    	'correct_answer',
    	'option_1',
    	'option_2',
    	'option_3',
    	'option_4',
    	'option_5',
    	'option_6',
    	'option_7',
    	'option_8',
    	'option_9',
    	'option_10',
    	'explanation',
        'marks',
		'status',
		'difficulty_level',
        'created_by',
	];

    protected $appends = ['options','correct_response','incorrect_response'];

    public function note(){
        return $this->belongsTo(Note::class,'note_id');
    }

    public function admin() {
        return $this->belongsTo(Admin::class, 'created_by');
    }

    public function getOptionsAttribute()
    {
        $options =  [
            $this->option_1,
            $this->option_2,
            $this->option_3,
            $this->correct_answer
        ];
        
        $options = array_filter($options);
        shuffle($options);
        return ($options);
    }

    public function getCorrectResponseAttribute()
    {
        return '<div class="incorrect-wrapper"><i class="fa fa-check"></i> <span>Correct.</span> </div>';
    }

    public function getIncorrectResponseAttribute()
    {
        return '<div class="incorrect-wrapper"><i class="fa fa-close"></i> <span>Incorrect.</span></div>';
    }
}
