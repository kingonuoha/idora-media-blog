<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogSetting extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "blog_name",
        "blog_description",
        "blog_email",
        "blog_telephone",
        "blog_address",
    ];
    // protected $table = "settings";
}
