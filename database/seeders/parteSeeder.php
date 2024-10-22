<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Parte;
use App\Models\User;

class parteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Generar un solo registro
        // $parte = Parte::factory()->create();

        // Generar múltiples registros
        Parte::factory()->count(10)->create();

        User::create([
            'name' => 'angel',
            'email' => 'angel@gmail.com',
            'password' => bcrypt('Pene1234'),
        ]);
    }
}
