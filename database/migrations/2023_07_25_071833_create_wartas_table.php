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
        Schema::create('tbl_warta', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 255);
            $table->text('isi');
            $table->string('sumber', 255);
            $table->string('dokumen', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_warta');
    }
};
