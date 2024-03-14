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
        Schema::create('gia_phongs', function (Blueprint $table) {
            $table->id();
            $table->integer('ma_phong');
            $table->integer('ma_loai_phong');
            $table->double('gia_theo_gio');
            $table->double('gia_theo_ngay');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gia_phongs');
    }
};
