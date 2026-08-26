<?php
// app/Models/Profile.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'institution_name',
        'institution_type',
        'address',
        'city',
        'province',
        'postal_code',
        'phone',
        'email',
        'website',
        'established_year',
        'legal_basis',
        'vision',
        'sambutan',      
        'nama_kepala',   
        'mission',
        'description',
        'logo',
        'foto_sejarah',
        'foto_sambutan'
    ];

    protected $casts = [
        'established_year' => 'integer',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function organigrams()
    {
        return $this->hasMany(Organigram::class);
    }

    public function facilities()
    {
        return $this->hasMany(Facility::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function news()
    {
        return $this->hasMany(News::class);
    }

    public function contactMessages()
    {
        return $this->hasMany(ContactMessage::class);
    }

    // Accessors
    public function getFullAddressAttribute()
    {
        return "{$this->address}, {$this->city}, {$this->province} {$this->postal_code}";
    }
}