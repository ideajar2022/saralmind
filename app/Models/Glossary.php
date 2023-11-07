<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Glossary extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
    	'word',
    	'meaning_english',
    	'meaning_nepali',
    	'created_by',
    	'status',
    ];
}
