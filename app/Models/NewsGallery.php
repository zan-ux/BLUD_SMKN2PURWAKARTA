<?php
// app/Models/NewsGallery.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsGallery extends Model
{
    use HasFactory;

    protected $table = 'news_gallery';

    protected $fillable = [
        'news_id',
        'image',
        'caption',
        'order_number',
    ];

    // Relationships
    public function news()
    {
        return $this->belongsTo(News::class);
    }
}