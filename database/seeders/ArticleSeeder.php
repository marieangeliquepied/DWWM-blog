<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $firstCategoryId = DB::table('categories')->oldest('id')->value('id');
        $firstUserId = DB::table('users')->oldest('id')->value('id');

        DB::table('articles')->insert([
            [
                'title'        => 'Découvrir la Martinique',
                'slug'         => 'decouvrir-la-martinique',
                'content'      => 'Une île magnifique avec des paysages à couper le souffle et une culture riche.',
                'status'       => 'PUBLISHED',
                'published_at' => Carbon::parse('2026-06-01 12:00:00'),
                'created_at'   => Carbon::parse('2026-06-01 10:00:00'),
                'category_id'  => $firstCategoryId,
                'user_id'      => $firstUserId
            ],
            [
                'title'        => 'Les bases du SQL',
                'slug'         => 'les-bases-du-sql',
                'content'      => 'Le SQL est le langage incontournable pour interroger et manipuler les bases de données efficacement.',
                'status'       => 'PUBLISHED',
                'published_at' => Carbon::parse('2026-06-02 16:00:00'),
                'created_at'   => Carbon::parse('2026-06-02 14:30:00'),
                'category_id'  => $firstCategoryId,
                'user_id'      => $firstUserId
            ],
            [
                'title'        => 'Pourquoi analyser les données',
                'slug'         => 'pourquoi-analyser-les-donnees',
                'content'      => 'La data permet de prendre des décisions éclairées et de comprendre les tendances cachées.',
                'status'       => 'DRAFT',
                'published_at' => null,
                'created_at'   => Carbon::parse('2026-06-05 09:15:00'),
                'category_id'  => $firstCategoryId,
                'user_id'      => $firstUserId
            ],
            [
                'title'        => 'Ma routine du matin',
                'slug'         => 'ma-routine-du-matin',
                'content'      => 'Prendre du temps pour soi dès le réveil permet de passer une journée productive et sereine.',
                'status'       => 'PUBLISHED',
                'published_at' => Carbon::parse('2026-06-10 08:30:00'),
                'created_at'   => Carbon::parse('2026-06-10 07:00:00'),
                'category_id'  => $firstCategoryId,
                'user_id'      => $firstUserId
            ],
            [
                'title'        => 'Introduction à Python',
                'slug'         => 'introduction-a-python',
                'content'      => 'Python est un langage puissant, lisible et parfait pour automatiser des tâches complexes.',
                'status'       => 'DRAFT',
                'published_at' => null,
                'created_at'   => Carbon::parse('2026-06-12 16:45:00'),
                'category_id'  => $firstCategoryId,
                'user_id'      => $firstUserId
            ],
            [
                'title'        => 'Les bienfaits du sport',
                'slug'         => 'les-bienfaits-du-sport',
                'content'      => 'Bouger un peu chaque jour booste l énergie et améliore grandement le bien-être mental.',
                'status'       => 'PUBLISHED',
                'published_at' => Carbon::parse('2026-06-15 14:00:00'),
                'created_at'   => Carbon::parse('2026-06-15 11:20:00'),
                'category_id'  => $firstCategoryId,
                'user_id'      => $firstUserId
            ],
            [
                'title'        => 'Organiser son espace de travail',
                'slug'         => 'organiser-son-espace-de-travail',
                'content'      => 'Un bureau bien rangé aide à garder l esprit clair et à rester concentré plus longtemps.',
                'status'       => 'DRAFT',
                'published_at' => null,
                'created_at'   => Carbon::parse('2026-06-18 13:10:00'),
                'category_id'  => $firstCategoryId,
                'user_id'      => $firstUserId
            ],
            [
                'title'        => 'Cuisiner simple et rapide',
                'slug'         => 'cuisiner-simple-et-rapide',
                'content'      => 'Il est tout à fait possible de se faire de bons petits plats équilibrés en moins de vingt minutes.',
                'status'       => 'PUBLISHED',
                'published_at' => Carbon::parse('2026-06-22 20:30:00'),
                'created_at'   => Carbon::parse('2026-06-22 19:00:00'),
                'category_id'  => $firstCategoryId,
                'user_id'      => $firstUserId
            ],
            [
                'title'        => 'L importance de la visualisation',
                'slug'         => 'l-importance-de-la-visualisation',
                'content'      => 'Un bon graphique vaut parfois mieux qu un long discours pour expliquer des chiffres.',
                'status'       => 'DRAFT',
                'published_at' => null,
                'created_at'   => Carbon::parse('2026-06-25 15:35:00'),
                'category_id'  => $firstCategoryId,
                'user_id'      => $firstUserId
            ],
            [
                'title'        => 'Prendre le temps de souffler',
                'slug'         => 'prendre-le-temps-de-souffler',
                'content'      => 'S avoir s accorder des pauses est essentiel pour recharger ses batteries et repartir de plus belle.',
                'status'       => 'PUBLISHED',
                'published_at' => Carbon::parse('2026-06-30 09:00:00'),
                'created_at'   => Carbon::parse('2026-06-30 08:00:00'),
                'category_id'  => $firstCategoryId,
                'user_id'      => $firstUserId
            ],
        ]);
    }
}