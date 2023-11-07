<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NoteComment extends Model
{
    use SoftDeletes;
   
    protected $fillable = [
    	'note_id',
    	'comment',
    	'commented_by',
    ];
    
    public function note(){
        return $this->belongsTo(Note::class, 'note_id');
    }

    public function replies(){
        return $this->hasMany(NoteCommentReplies::class, 'comment_id')->orderBy('id', 'DESC');
    }

    public function user() {
        //return $this->belongsTo('Saralmind\Models\User\Profile', 'nc_commented_by');
    }
}
