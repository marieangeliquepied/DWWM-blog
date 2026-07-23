<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Création d'un compte ADMIN pour tes tests
        User::factory()->create([
            'firstname' => 'Admin',
            'lastname' => 'Master',
            'email' => 'admin@test.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::factory()->create([
            'firstname' => 'Test',
            'lastname' => 'User',
            'email' => 'user@test.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        // 2. Création de 5 utilisateurs classiques
        User::factory(5)->create();

        // 3. Tes seeders existants pour les catégories et articles
        $this->call([
            CategorySeeder::class,
            ArticleSeeder::class,
        ]);
    }
}