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
            $table->dateTime('login_at')->nullable();
            $table->dateTime('logout_at')->nullable();
            $table->ipAddress('ip')->nullable();
            // $table->foreign(['ip'])->references(['ip_address'])->on('sessions');
            $table->string('agent')->nullable();
            // $table->foreign(['agent'])->references(['user_agent'])->on('sessions');
            $table->string('browser')->nullable();
            $table->json('location')->nullable();

            $table->timestamps();
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
