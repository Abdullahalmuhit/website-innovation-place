<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage; // make sure to import this



class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'category_id',
        'featured_image',
        'is_published',
        'published_at'
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function scopePublished($query)
    {
        return $query->where('is_published', true)
            ->whereNotNull('published_at')
            ->orderBy('published_at', 'desc');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->title);
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getImageUrlAttributePath()
    {
        return 'uploads/avatars';
    }
    public function getImageUrlAttribute()
    {
        return $this->featured_image ? asset('storage/' . $this->featured_image) : null;
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'blog_tags', 'blog_post_id', 'tag_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function categoryName()
    {
        return $this->category ? $this->category->name : null;
    }


}
