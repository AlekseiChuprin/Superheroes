<?php

use Illuminate\Database\Seeder;

class Superhero extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('superheroes')->insert([
            [
                'nickname' => 'Superman',
                'real_name' => 'Clark Kent',
                'origin_description' => 'he was born Kal-El on the planet Krypton, before being rocketed to
                                         Earth as an infant by his scientist father Jor-El, moments before Krypton',
                'superpowers' => 'solar energy absorption and healing factor, solar flare and heat vision,
                                         solar invulnerability, flight',
                'catch_phrase' => '“Look, up in the sky, its a bird, its a plane, its Superman!',
            ],
            [
                'nickname' => 'Batman',
                'real_name' => 'Брюс Уэйн',
                'origin_description' => 'Batman: The Dark Knight Returns',
                'superpowers' => 'Бэтмен противостоит преступному сообществу, коррумпированным политикам и продажным представителям власти Готэма',
                'catch_phrase' => 'В настоящее время Бэтмен входит в тройку величайших супергероев (вместе с Суперменом и Человеком-Пауком',
            ],

        ]);
    }
}
