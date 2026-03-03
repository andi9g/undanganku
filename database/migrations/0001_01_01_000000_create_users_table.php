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
        Schema::create('user', function (Blueprint $table) {
            $table->bigIncrements('iduser');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('identitas', function (Blueprint $table) {
            $table->bigIncrements('ididentitas');
            $table->foreignId('iduser')->unique();
            $table->string('alamat');
            $table->string('hp');
            $table->timestamps();
        });

        Schema::create('hakakses', function (Blueprint $table) {
            $table->bigIncrements('idhakakses');
            $table->foreignId('iduser')->unique();
            $table->enum('hakakses', ['admin', 'user']);
            $table->timestamps();
        });

        Schema::create('langganan', function (Blueprint $table) {
            $table->bigIncrements('idlangganan');
            $table->foreignId('idhakakses')->unique();
            $table->string('durasi');
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
        Schema::dropIfExists('identitas');
        Schema::dropIfExists('hakakses');
        Schema::dropIfExists('langganan');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
