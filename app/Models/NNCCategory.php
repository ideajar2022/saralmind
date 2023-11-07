<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NNCCategory extends Model
{
    protected $table = 'nnc_categories';

    protected $fillable = ['name','possible_items'];
    
    public function nnc_liscense_question(){
        return $this->hasMany(NNCLiscenseQuestion::class,'category_id');
    }
}
