<?php

use Illuminate\Database\Seeder;
use App\Consultative;

class consultativesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        factory(App\Consultative::class, 50)->create();
        



    }
}
