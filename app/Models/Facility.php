<?php
// app/Models/Facility.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'name',
        'category',
        'description',
        'image',
        'location',
        'capacity',
        'operating_hours',
        'status',
    ];

    // Relationships
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    // Scopes
    public function scopeAvailable($query)
    {
        return $query->where('status', 'available');
    }

    // Accessors
    public function getStatusLabelAttribute()
    {
        return match($this->status) {
            'available' => 'Tersedia',
            'maintenance' => 'Dalam Perawatan',
            'unavailable' => 'Tidak Tersedia',
            default => 'Unknown',
        };
    }
}