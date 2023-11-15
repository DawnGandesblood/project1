<?php

use App\Models\Data;
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
        Schema::create('data', function (Blueprint $table) {
            $table->id('data_id');
            $table->integer('nis')->unique();
            $table->string('nama');
            $table->enum('kelas', ['X','XI','XII']);
            $table->enum('jurusan', ['TJKT','RPL','DKV','ANIM']);
            $table->timestamps();
        });

        $faker = \faker\Factory::create();
        for ($i = 0; $i < 50; $i++) {
            data::create([
                'nis' => $faker->randomNumber(4, true),
                'nama' => $faker->sentence(2, true),
                'kelas' => $faker->randomElement(['X', 'XI', 'XII']),
                'jurusan' => $faker->randomElement(['TJKT', 'RPL', 'DKV', 'ANIM']),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data');
    }
};
