<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = [
        'tag_name',
        'tag_description',
    ];
    public function articleTagRelations()
    {
        return $this->hasMany(ArticleTagRelation::class);
    }
}
