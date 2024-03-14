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
        Schema::create('thong_tin_khach_sans', function (Blueprint $table) {
            $table->id();
            $table->string('ten_khach_san');
            $table->string('dia_chi');
            $table->longText('mo_ta');
            $table->string('thanh_pho');
            $table->string('quoc_gia');
            $table->string('so_dien_thoai');
            $table->string('email');
            $table->string('nguoi_dai_dien');
            $table->integer('is_open');
            $table->string('website');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thong_tin_khach_sans');
    }
};
