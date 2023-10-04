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
    // Define the allowed statuses
    protected $attributes = [
        'status' => 'pending', // Set the default status
    ];
    // Define a list of allowed statuses
    const ALLOWED_STATUSES = ['pending', 'published'];
    // Make sure the status is one of the allowed values
    public function setStatusAttribute($value)
    {
        if (in_array($value, self::ALLOWED_STATUSES)) {
            $this->attributes['status'] = $value;
        }
    }
    public function articleTagRelations()
    {
        return $this->hasMany(ArticleTagRelation::class);
    }
}
