<?php

use Illuminate\Database\Seeder;

class SkolyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        factory(App\Skola::class, 10)->create();
    }
}
