<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Seedeamos la base de datos a partir de los factories
        \App\Models\User::factory(10)->create();
        \App\Models\Category::factory(100)->create();
        \App\Models\Favorite::factory(100)->create();

        //Seedeamos la tabla pivot entre categorías y favoritos
        $categories = \App\Models\Category::all();
        \App\Models\Favorite::all()->each(function ($favorite) use ($categories) {
            $favorite->categories()->attach(
                $categories->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
