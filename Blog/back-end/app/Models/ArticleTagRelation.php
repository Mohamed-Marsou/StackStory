<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleTagRelation extends Model
{
    use HasFactory;
    protected $table = 'article_tag_relation';

    protected $fillable = [
        'tag_id',
        'article_id',
    ];

    // Define the relationships with the Tag and Article models
    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
