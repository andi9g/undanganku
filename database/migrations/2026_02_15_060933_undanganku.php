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
        Schema::dropIfExists('undangan');
        Schema::create('undangan', function (Blueprint $table) {
            $table->bigIncrements('idundangan');
            $table->unsignedBigInteger('iduser');
            $table->date('tanggal');
            $table->char('kode', 10);
            $table->timestamps();
        });
        Schema::dropIfExists('identitaspengantin');
        Schema::create('identitaspengantin', function (Blueprint $table) {
            $table->bigIncrements('ididentitaspengantin');
            $table->unsignedBigInteger('idundangan');
            $table->string('namapengantinpria');
            $table->string('namapengantinwanita');
            $table->string('fotopengantin')->nullable();            
            $table->timestamps();
        });
        Schema::dropIfExists('lokasi');
        Schema::create('lokasi', function (Blueprint $table) {
            $table->bigIncrements('idlokasi');
            $table->unsignedBigInteger('idundangan');
            $table->string('namalokasi');
            $table->string('alamat');
            $table->string('long');
            $table->string('lat');
            $table->timestamps();
        });
        Schema::dropIfExists('gallery');
        Schema::create('gallery', function (Blueprint $table) {
            $table->bigIncrements('idgallery');
            $table->unsignedBigInteger('idundangan');
            $table->string('fotogallery');
            $table->timestamps();
        });
        Schema::dropIfExists('gaun');
        Schema::create('gaun', function (Blueprint $table) {
            $table->bigIncrements('idgaun');
            $table->unsignedBigInteger('idundangan');
            $table->string('namagaun');
            $table->string('deskripsigaun')->nullable();
            $table->string('fotogaun');
            $table->enum('waktugaun', ['pagi', 'siang', 'malam', 'sore']);
            $table->timestamps();
        });
        Schema::dropIfExists('rekening');
        Schema::create('rekening', function (Blueprint $table) {
            $table->bigIncrements('idrekening');
            $table->unsignedBigInteger('idundangan');
            $table->string('namabank');
            $table->string('nomorrekening');
            $table->string('urlgambar');
            $table->string('atasnama');
            $table->timestamps();
        });
        Schema::dropIfExists('komentar');
        Schema::create('komentar', function (Blueprint $table) {
            $table->bigIncrements('idkomentar');
            $table->unsignedBigInteger('idundangan');
            $table->string('namakomentar');
            $table->text('komentar');
            $table->boolean('tampilkan')->default(false);
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
