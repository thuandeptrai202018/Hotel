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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('ho_lot');
            $table->string('ten');
            $table->string('email');
            $table->string('password');
            $table->string('ho_va_ten');
            $table->date('ngay_sinh');
            $table->string('so_dien_thoai');
            $table->string('dia_chi');
            $table->integer('gioi_tinh');
            $table->integer('id_quyen')->nullable();
            $table->longText('hash_word')->nullable();
            $table->integer('is_master')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
