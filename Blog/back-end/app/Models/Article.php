<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'article_title',
        'article_summary',
        'article_content',
        'author_id',
        'published_at',
        'status',
        'meta_title',
        'slug',
    ];
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
