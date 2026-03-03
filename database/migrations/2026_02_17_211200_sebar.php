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
        Schema::dropIfExists('sebarundangan');
        Schema::create('sebarundangan', function (Blueprint $table) {
            $table->bigIncrements('idsebarundangan');
            $table->unsignedBigInteger('idundangan');
            $table->char('kodepenerima', 10);
            $table->string('namapenerima');
            $table->string('emailpenerima')->nullable();
            $table->string('whatsapppenerima')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
