<?php
// app/Models/ServiceCategory.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ServiceCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'name',
        'slug',
        'description',
        'icon',
    ];

    // Boot method to auto-generate slug
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });
    }

    // Relationships
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class, 'category', 'name');
    }

    // Scopes
    public function scopeWithServices($query)
    {
        return $query->withCount('services');
    }
}