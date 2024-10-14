<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'name',
        "google_id",
        "facebook_id",
        "profile_photo_path",
        "profile_photo_updated_at",
        "last_login",
        "last_ip",
        "role",
        "email_sent_at",
        "first_time",
        // "about_me",
        "blocked",
        'digital_marketing',
        'content_creation',
        'bloging',
        'facebook_url',
        'youtube_url',
        'instagram_url',
        'twitter_url',
        'about_me',
        'about_work',
        'occupation',
        'phone',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'author_id', 'id');
    }

    public function scopeSearch($query, $term){
        $term  = "%$term%";
        $query->where(function($query) use ($term){
            $query->where('name', 'like', $term)
            ->orWhere('email', 'like', $term);
        });
    }

    // public function getProfilePhotoPathAttribute($value){
    //     if($value && $value != null){
    //         return 'storage/images/authors/'.$value;
    //     }else{
            
    //         return asset('idora_img/profile/'.strtoupper(substr($value->name, 0, 1)).".png");
    //     }
    // }
}
