<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogSocialMedia extends Model
{
    use HasFactory;

    protected $fillable=[
        "blog_facebook",
        "blog_twitter",
        "blog_youtube",
        "blog_instagram",
    ];
}
