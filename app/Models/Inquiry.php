<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inquiry extends Model
{
    use SoftDeletes;
	
    protected $fillable = [
    	'name',
    	'email',
    	'subject',
    	'contact_no',
		'status',
		'message'
	];

	protected $dates = ['deleted_at'];
}
