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
        Schema::dropIfExists('orangtua');
        Schema::create('orangtua', function (Blueprint $table) {
            $table->bigIncrements('idorangtua');
            $table->unsignedBigInteger('idundangan');
            $table->enum("pihak", ["L", "P"]);
            $table->string("namabapak");
            $table->string("namaibu");
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
