<?php

use Illuminate\Database\Seeder;

class SenderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Model\Sender::class, 3)->create();
    }
}
