<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bug extends Model
{
    use SoftDeletes;
	
    protected $fillable = [
    	'url',
    	'reported_by',
    	'bug',
		'status',
		'remarks'
	];

	protected $dates = ['deleted_at'];

	public function user(){
        return $this->belongsTo(User::class, 'reported_by');
    }
}
