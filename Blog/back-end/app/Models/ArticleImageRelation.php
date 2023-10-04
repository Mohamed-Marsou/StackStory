<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleImageRelation extends Model
{
    use HasFactory;
    protected $table = 'article_image_relation';
    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }

    /**
     * Define the relationship with the Image model.
     */
    public function images()
    {
        return $this->belongsToMany(Image::class);
    }
}
