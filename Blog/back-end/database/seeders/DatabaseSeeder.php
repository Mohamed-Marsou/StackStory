<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\AdminSeeder;
use Database\Seeders\UsersSeeder;
use Database\Seeders\ArticlesSeeder;
use Database\Seeders\ImagesSeeder;
use Database\Seeders\CommentsSeeder;
use Database\Seeders\LikesSeeder;
use Database\Seeders\TagsSeeder;
use Database\Seeders\ArticleImageRelationSeeder;
use Database\Seeders\ArticleTagRelationSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call([
            AdminSeeder::class,
            UsersSeeder::class,
            ArticlesSeeder::class,
            ImagesSeeder::class,
            CommentsSeeder::class,
            LikesSeeder::class,
            TagsSeeder::class,
            ArticleImageRelationSeeder::class,
            ArticleTagRelationSeeder::class,

        ]);
    }
}
