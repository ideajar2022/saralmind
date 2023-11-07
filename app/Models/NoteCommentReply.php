<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NoteCommentReply extends Model
{
    use SoftDeletes;
   
    protected $fillable = [
    	'comment_id',
    	'reply',
    	'replied_by',
    ];

    public function comment(){
        return $this->belongsTo(NoteComments::class, 'comment_id');
    }

    public function user() {
        //return $this->belongsTo('Saralmind\Models\User\Profile', 'ncr_replied_by');
    }

}
