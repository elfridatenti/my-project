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
        Schema::create('alumni', function (Blueprint $table) {
            $table->id();
            $table->string('nim', 20);
            $table->string('angkatan', 5);
            $table->string('tahun_lulus', 5);
            $table->string('jurusan', 100);
            $table->string('profesi');
            $table->string('nama_instansi');
            $table->text('alamat');
            $table->string('kota');
            $table->string('ijazah', 100);
            $table->string('ktp', 100);
            $table->string('foto', 100);
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumni');
    }
};
