<?php

use Illuminate\Database\Seeder;

class TedTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Model\Ted::class, 10)->create();
    }
}
