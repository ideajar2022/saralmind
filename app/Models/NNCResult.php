<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NNCResult extends Model
{
    protected $table = 'nnc_results';

    protected $fillable = [
        'user_id',
        'session_id',
        'quiz_name',
        'question_answer',
        'points',
        'percentage',
        'category_wise_percentage'
    ];

    protected $casts = [
        'question_answer' => 'array',
        'points' => 'array',
        'category_wise_percentage' => 'array'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
