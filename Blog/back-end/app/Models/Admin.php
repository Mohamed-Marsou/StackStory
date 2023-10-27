<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'image_url',
        'email_created_at',
        'email_verified_at',
        'web_link',
        'facebook_link',
        'linkedin_link',
        'instagram_link',
        'x_link',
        'summary',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function articles()
    {
        return $this->hasMany(Article::class, 'author_id');
    }
}
