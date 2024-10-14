<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogViews extends Model
{
    use HasFactory;
    protected $fillable = [
       'post_id',
       "ip_address",
       "device_name",
       "browser",
       "isMobile",
       "os",
    ];
}
