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
        Schema::create('gerbong', function (Blueprint $table) {
            $table->increments("id_tipe_gerbong");
            $table->string("kapasitas_tipe_gerbong");
            $table->integer("nama_tipe_gerbong");
            $table->unsignedInteger("id_kereta");
            $table->timestamps();

            $table->foreign("id_kereta")->references("id_kereta")->on("kereta")->onDelete("cascade");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gerbong');
    }
};
