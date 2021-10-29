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
        // \App\Models\User::factory(10)->create();

        \App\Models\Content::factory(10)
            ->hasVideos(1)
            ->create();

        \App\Models\Content::factory(10)
            ->contentSeries() //muda o estado do tipo, que é 1 para 2
            ->hasVideos(5)
            ->create();
    }
}
