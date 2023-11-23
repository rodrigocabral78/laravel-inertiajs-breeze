<?php

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('post_tags', function (Blueprint $table) {
            $table->id();

            $table->foreignId('post_id')->constrained();
            // $table->foreignId('post_id');
            // $table->foreign('post_id')->references('id')->on('posts');

            $table->foreignId('tag_id')->constrained();
            // $table->foreignId('tag_id');
            // $table->foreign('tag_id')->references('id')->on('tags');

            $table->foreignId('created_by')->nullable()->index();
            $table->foreignId('updated_by')->nullable()->index();
            $table->timestamps();
            $table->index('created_at');
            $table->index('updated_at');
            $table->softDeletes()->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_tags');
    }
};
