<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Inisialisasi Faker
        $faker = Faker::create();

        // Menambahkan user super admin secara manual
        DB::table('users')->insert([
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@gmail.com',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'email_verified_at' => now(),
                'is_admin' => 1,
                'address' => $faker->address, // Menambahkan alamat acak menggunakan Faker
            ],
        ]);

        // Men-generate 99 user secara otomatis menggunakan factory
        User::factory()->count(99)->create();
    }
}
