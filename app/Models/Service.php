<?php
// app/Models/Service.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'name',
        'category',
        'description',
        'image',
        'requirements',
        'is_online',
        'status',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_online' => 'boolean',
        'status' => 'string',
    ];

    // Relationships
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'category', 'name');
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeOnline($query)
    {
        return $query->where('is_online', true);
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    // Accessors
    public function getPriceFormattedAttribute()
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }

    public function getIsOnlineLabelAttribute()
    {
        return $this->is_online ? 'Online' : 'Offline';
    }
}