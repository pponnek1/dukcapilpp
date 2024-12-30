<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    protected $model = \App\Models\User::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(), // Nama acak
            'email' => $this->faker->unique()->safeEmail(), // Email unik acak
            'password' => Hash::make('password'), // Hash password default
        ];
    }
}
