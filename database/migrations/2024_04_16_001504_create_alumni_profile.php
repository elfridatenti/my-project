<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * 
     */
    public function up(): void
    {
        Schema::create('alumni_profile', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('profesi');
            $table->string('tahun_lulus', 5);
            $table->string('jurusan');
            $table->text('desk')->nullable();
            $table->string('img');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumni_profile');
    }
};
