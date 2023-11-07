<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NNCLiscenseQuestion extends Model
{
    protected $table = 'nnc_liscense_questions';
    use SoftDeletes;
    
    protected $fillable = [
        'category_id',
        'question',
        'correct_answer',
        'option_1',
        'option_2',
        'option_3',
        'option_4',
        'option_5',
        'explanation',
    ];
    
    public function nnc_category(){
        return $this->belongsTo(NNCCategory::class, 'category_id');
    }
}
