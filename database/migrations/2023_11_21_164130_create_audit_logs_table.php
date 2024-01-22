<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('audit_logs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->nullable()->constrained();

            $table->string('session_id')->nullable();
            // $table->foreign(['session_id'])->references(['id'])->on('sessions');
            // $table->string('session_name')->nullable();
            $table->boolean('login_successfully')->default(false);

            $table->string('agent')->nullable();
            // $table->foreign(['agent'])->references(['user_agent'])->on('sessions');
            $table->string('browser')->nullable();
            $table->ipAddress('ip')->nullable();
            // $table->foreign(['ip'])->references(['ip_address'])->on('sessions');
            $table->json('location')->nullable();

            $table->timestamp('login_at')->nullable();
            $table->timestamp('logout_at')->nullable();
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
        Schema::dropIfExists('audit_logs');
    }
};
