<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NoteVideo extends Model
{
    use SoftDeletes;

    protected $fillable = [
    	'note_id',
        'url',
    	'key',
    	'title',
    	'description',
		'created_by',
		'counter',
		'type',
		'status'
	];


    public function note(){
        return $this->belongsTo(Note::class,'note_id');
    }

    public function admin() {
        return $this->belongsTo(Admin::class, 'created_by');
    }
}
