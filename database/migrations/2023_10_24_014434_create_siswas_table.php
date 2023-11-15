<?php

use App\Models\Siswa;
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
        Schema::create('siswa', function (Blueprint $table) {
            $table->string('nis')->primary();
            $table->string('nama');
            $table->string('id_jurusan');
            $table->enum('kelas' , ['X','XI','XII']);
            $table->string('email');
            $table->timestamps();
        });

        $faker = \faker\Factory::create();
        for ($i = 0; $i < 50; $i++) {
            Siswa::create([
                'nis' => $faker->randomNumber(4, true),
                'nama' => $faker->sentence(2, true),
                'id_jurusan' => 'J' . $faker->randomNumber(3, true),
                'kelas' => $faker->randomElement(['X', 'XI', 'XII']),
                'email' => $faker->email,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
