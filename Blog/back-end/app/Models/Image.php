<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'image_path',
        'is_cover',
    ];

    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_image_relation');
    }
}
