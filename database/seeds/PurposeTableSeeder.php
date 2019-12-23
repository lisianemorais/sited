<?php

use Illuminate\Database\Seeder;

class PurposeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        DB::table('purposes')->delete();

        $items = [            
            ['description' => 'Crédito em Conta'],
            ['description' => 'Pagamento de Dívidas'],
            ['description' => 'Aluguel']
        ];
    
        foreach ($items as $item) {
            DB::table('purposes')->insert($item);
        }
    }
}
