<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory;
    use Sluggable;


    protected $fillable = [
        'author_id',
        'category_id',
        'post_slug',
        'post_content',
        'featured_image',
        'post_title',
        'meta_title',
        'meta_desc',
        'meta_tags',
    ];

        /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'post_slug' => [
                'source' => 'post_title'
            ]
        ];
    }

    public function scopeSearch($query, $term){
        $term = "%$term%";
        $query->where(function($query) use($term){
            $query->where('post_title','like', $term);
        });
    }
    public function scopeSearchUser($query, $term){
        $term = "%$term%";
        $query->where(function($query) use($term){
            $query->where('post_title','like', $term)->where('author_id', auth()->user()->id);
        });
    }

    public function subCategory(){
        return $this->belongsTo(SubCategory::class, 'category_id');
    }
    public function author(){
        return $this->belongsTo(User::class, 'author_id', 'id');
    }
    public function views(){
        return $this->hasMany(BlogViews::class, 'post_id', 'id');
    }
}
