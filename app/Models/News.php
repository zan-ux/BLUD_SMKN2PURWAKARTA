<?php
// app/Models/News.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'title',
        'slug',
        'content',
        'image',
        'category',
        'tags',
        'status',
        'published_at',
        'created_by',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    // Boot method untuk auto-generate slug
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($news) {
            if (empty($news->slug)) {
                $news->slug = Str::slug($news->title) . '-' . Str::random(6);
            }
        });
    }

    // Relationships
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function gallery()
    {
        return $this->hasMany(NewsGallery::class);
    }

    // Scopes
    public function scopePublished($query)
    {
        return $query->where('status', 'published')
                     ->whereNotNull('published_at')
                     ->where('published_at', '<=', now());
    }

    // Accessors
    public function getExcerptAttribute()
    {
        return Str::limit(strip_tags($this->content), 150);
    }

    public function getTagsArrayAttribute()
    {
        return $this->tags ? explode(',', $this->tags) : [];
    }

    // Helper methods
    public function publish()
    {
        $this->update([
            'status' => 'published',
            'published_at' => now(),
        ]);
    }

    public function archive()
    {
        $this->update(['status' => 'archived']);
    }
}