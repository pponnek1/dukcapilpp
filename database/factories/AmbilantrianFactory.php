<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ambilantrian>
 */
class AmbilantrianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tanggal' => now()->timezone('Asia/Jakarta')->toDateString(), // Tanggal hari ini
            'nama_lengkap' => $this->faker->name(), // Nama acak
            'alamat' => $this->faker->address(), // Alamat acak
            'kode' => 'KTP-0' . $this->faker->unique()->numberBetween(1, 20), // Kode unik
            'nomorhp' => $this->faker->phoneNumber(), // Nomor telepon acak
            'antrian_id' => 1, // ID layanan antara 1 hingga 5
            'batas_antrian' => 20, // Batas antrian tetap 100
            'user_id' => $this->faker->numberBetween(1, 50), // User ID acak
            'created_at' => $this->faker->dateTimeThisMonth(), // Waktu pembuatan di bulan ini
        ];
    }
}
