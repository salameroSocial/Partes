<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$12$CyAx6wst1cnB5Xd6C6POFORMpxRLOTJwEBywAMxWplNVKjKdQFu4q',
                'remember_token' => null,
                'created_at' => '2024-06-11 06:39:24',
                'updated_at' => '2024-06-11 06:39:24',
            ],
            [
                'id' => 2,
                'name' => 'administración',
                'email' => 'administracion@somontanosocial.com',
                'email_verified_at' => null,
                'password' => '$2y$12$Mc4uf3B8smvkJpDBS5dC9OnTy6tmrK/dzYGZgycHE1ggbbwugLh3i',
                'remember_token' => null,
                'created_at' => '2024-06-13 02:31:52',
                'updated_at' => '2024-06-13 02:31:52',
            ],
            [
                'id' => 3,
                'name' => 'Brigada',
                'email' => 'brigada@somontanosocial.com',
                'email_verified_at' => null,
                'password' => '$2y$12$CuQMY5616IIpoQB3PL1tE.s/z.o7rfD30DXuKF594ShJ/sQVsw8Wi',
                'remember_token' => null,
                'created_at' => '2024-06-13 02:34:25',
                'updated_at' => '2024-06-13 02:34:25',
            ],
            [
                'id' => 4,
                'name' => 'Limpieza',
                'email' => 'limpieza@somontanosocial.com',
                'email_verified_at' => null,
                'password' => '$2y$12$5RfLVJbB21ntOWcajv4JnuXBO59uEpS3aJvSXAxzf4gl98sy1LnUS',
                'remember_token' => null,
                'created_at' => '2024-06-13 02:35:28',
                'updated_at' => '2024-06-13 02:35:28',
            ],
            [
                'id' => 5,
                'name' => 'Servicios externos',
                'email' => 'servicios@somontanosocial.com',
                'email_verified_at' => null,
                'password' => '$2y$12$E3VZGUgPa5loriVQExy0/elf8q4BmmbMSlKrEZrpuuTKl5rVr4RB.',
                'remember_token' => null,
                'created_at' => '2024-06-13 02:36:16',
                'updated_at' => '2024-06-13 02:36:16',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
