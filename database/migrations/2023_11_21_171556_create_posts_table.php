<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->uuid()->nullable()->index();

            $table->foreignId('user_id')->constrained();
            // $table->foreign(['user_id'])->references(['id'])->on('users');
            // VARCHAR equivalent column with a length.
            $table->string('slug', 255)->unique(); // Index
            $table->string('title', 255)->index();
            // TEXT equivalent column.
            $table->text('description');
            $table->text('post');

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
        Schema::dropIfExists('posts');
    }
};
