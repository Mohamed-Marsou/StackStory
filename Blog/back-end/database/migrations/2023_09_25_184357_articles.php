<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('article_title');
            $table->text('article_summary');
            $table->longText('article_content');
            $table->foreignId('author_id')->constrained('admins');
            $table->timestamps();
            $table->timestamp('published_at')->nullable();
            $table->string('status')->default('pending');
            $table->string('meta_title');
            $table->string('slug');
            $table->boolean('is_featured');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
