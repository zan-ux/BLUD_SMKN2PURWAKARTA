<?php
// app/Models/ContactMessage.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'name',
        'email',
        'phone',
        'subject',
        'message',
        'status',
        'replied_at',
    ];

    protected $casts = [
        'replied_at' => 'datetime',
    ];

    // Relationships
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    // Scopes
    public function scopeNew($query)
    {
        return $query->where('status', 'new');
    }

    public function scopeRead($query)
    {
        return $query->where('status', 'read');
    }

    public function scopeReplied($query)
    {
        return $query->where('status', 'replied');
    }

    // Helper methods
    public function markAsRead()
    {
        $this->update(['status' => 'read']);
    }

    public function markAsReplied()
    {
        $this->update([
            'status' => 'replied',
            'replied_at' => now(),
        ]);
    }
}