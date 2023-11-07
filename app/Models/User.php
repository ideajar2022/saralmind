<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable,HasApiTokens,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'name', 'image',  'address', 'phone_no', 'dob' , 'type', 'status','school_name','profile_privacy_status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'profile_privacy_status' => 'array'
    ];

    protected $appends = ['image_url','thumbnail_url'];

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset( config('uploads.directory')['user'].'/'. $this->image);
        }
        return asset('frontend/img/user-icon.svg');
    }

    public function getThumbnailUrlAttribute()
    {
        if ($this->image) {
            return asset( config('uploads.directory')['user'].'/thumbs/'. $this->image);
        }
        return asset('image/no-image.png');
    }


    public function identities() {
       return $this->hasMany(SocialIdentity::class);
    }

    public function grades() {
       return $this->belongsToMany(Grade::class,'users_grades');
    }

    public function subjects() {
       return $this->belongsToMany(Subject::class,'users_subjects');
    }
}
