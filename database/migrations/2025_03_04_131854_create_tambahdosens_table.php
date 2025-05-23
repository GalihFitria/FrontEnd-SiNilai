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

        Schema::create('tambahdosens', function (Blueprint $table) {
            $table->id();
            $table->string('nidn')->unique(); // NIDN unik
            $table->string('nama_dosen'); // Nama dosen
            $table->timestamps();
        });

        // Schema::create('tambahdosens', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tambahdosens');
    }
};
