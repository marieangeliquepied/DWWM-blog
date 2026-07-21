<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
        'name'       => 'Data Science',
        'slug'       => 'data-science',
        'created_at' => Carbon::parse('2026-06-01 09:00:00'),
    ],
    [
        'name'       => 'Développement Web',
        'slug'       => 'developpement-web',
        'created_at' => Carbon::parse('2026-06-01 09:05:00'),
    ],
    [
        'name'       => 'SQL & Bases de données',
        'slug'       => 'sql-et-bases-de-donnees',
        'created_at' => Carbon::parse('2026-06-01 09:10:00'),
    ],
    [
        'name'       => 'Python',
        'slug'       => 'python',
        'created_at' => Carbon::parse('2026-06-01 09:15:00'),
    ],
    [
        'name'       => 'Bien-être & Santé',
        'slug'       => 'bien-etre-et-sante',
        'created_at' => Carbon::parse('2026-06-01 09:20:00'),
    ],
    [
        'name'       => 'Voyages & Découvertes',
        'slug'       => 'voyages-et-decouvertes',
        'created_at' => Carbon::parse('2026-06-01 09:25:00'),
    ],
    [
        'name'       => 'Productivité',
        'slug'       => 'productivite',
        'created_at' => Carbon::parse('2026-06-01 09:30:00'),
    ],
    [
        'name'       => 'Cuisine & Recettes',
        'slug'       => 'cuisine-et-recettes',
        'created_at' => Carbon::parse('2026-06-01 09:35:00'),
    ],
    [
        'name'       => 'Organisation',
        'slug'       => 'organisation',
        'created_at' => Carbon::parse('2026-06-01 09:40:00'),
    ],
    [
        'name'       => 'Développement personnel',
        'slug'       => 'developpement-personnel',
        'created_at' => Carbon::parse('2026-06-01 09:45:00'),
    ],    
        ]);
    }
}
