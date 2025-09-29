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
        Schema::create('tiket', function (Blueprint $table) {
            $table->increments("id_tiket");
            $table->unsignedInteger("id_kereta");
            $table->unsignedInteger("id_stasiun_asal");
            $table->unsignedInteger("id_stasiun_tujuan");
            $table->date("tanggal_keberangkatan");
            $table->date("tanggal_sampai");
            $table->time("waktu_keberangkatan");
            $table->time("waktu_sampai");
            $table->timestamps();

            # foreign key
            $table->foreign("id_kereta")->references("id_kereta")->on("kereta")->onDelete("cascade");
            $table->foreign("id_stasiun_asal")->references("id_stasiun")->on("stasiun")->onDelete("cascade");
            $table->foreign("id_stasiun_tujuan")->references("id_stasiun")->on("stasiun")->onDelete("cascade");
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tiket');
    }
};
