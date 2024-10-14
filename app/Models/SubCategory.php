<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable =[
        'subcategory_name',
        'slug',
        'parent_category',
        'ordering'
    ];

    public function parentCategory(){
        return $this->hasOne(Category::class, 'id', 'parent_category');
    }

    public function posts(){
        return $this->hasMany(Post::class, 'category_id', 'id');
    }
}
