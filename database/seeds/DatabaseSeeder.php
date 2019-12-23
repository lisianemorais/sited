<?php

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
        $this->call(BanksTableSeeder::class);
        $this->call(AccountTypesTableSeeder::class);
        $this->call(PurposeTableSeeder::class);
        $this->call(SenderTableSeeder::class);
        $this->call(ReceiverTableSeeder::class);
        $this->call(TedTableSeeder::class);
    }
}
