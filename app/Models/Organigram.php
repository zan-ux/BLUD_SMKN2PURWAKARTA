<?php
// app/Models/Organigram.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organigram extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'name',
        'position',
        'department',
        'parent_id',
        'photo',
        'description',
        'order_number',
    ];

    // Relationships
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function parent()
    {
        return $this->belongsTo(Organigram::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Organigram::class, 'parent_id');
    }

    // Scopes
    public function scopeRoot($query)
    {
        return $query->whereNull('parent_id');
    }
}