<?php

use Illuminate\Database\Seeder;

class ReceiverTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Model\Receiver::class, 3)->create();
    }
}
