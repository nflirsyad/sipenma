<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        DB::table('users')->insert([
            'username' => 'admin',
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('admin'),
            'level' => 3,
            'remember_token' => Str::random(60),
            'created_at' => now()
        ]);

        DB::table('users')->insert([
            'username' => 'petugas',
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('petugas'),
            'level' => 2,
            'remember_token' => Str::random(60),
            'created_at' => now()
        ]);

        DB::table('users')->insert([
            'username' => 'mahasiswa',
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('mahasiswa'),
            'level' => 1,
            'remember_token' => Str::random(60),
            'created_at' => now()
        ]);
    }
}
