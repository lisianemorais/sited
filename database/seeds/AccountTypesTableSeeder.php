<?php

use Illuminate\Database\Seeder;

class AccountTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('account_types')->delete();

        $items = [            
            ['description' => 'Conta Corrente'],
            ['description' => 'Conta Poupança'],
        ];
    
        foreach ($items as $item) {
            DB::table('account_types')->insert($item);
        }
    }
}
