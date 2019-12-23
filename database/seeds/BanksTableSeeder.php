<?php

use Illuminate\Database\Seeder;

class BanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banks')->delete();

        $items = [            
            ['code' => '001', 'description' => 'Banco do Brasil S.A.'],
            ['code' => '341', 'description' => ' Banco Itaú S.A.'],
            ['code' => '033', 'description' => 'Banco Santander (Brasil) S.A.'],
            ['code' => '356', 'description' => 'Banco Real S.A. (antigo)'],
            ['code' => '652', 'description' => 'Itaú Unibanco Holding S.A.'],
            ['code' => '237', 'description' => 'Banco Bradesco S.A.'],
            ['code' => '745', 'description' => 'Banco Citibank S.A.'],
            ['code' => '399', 'description' => 'HSBC Bank Brasil S.A. – Banco Múltiplo'],
            ['code' => '104', 'description' => 'Caixa Econômica Federal'],
            ['code' => '389', 'description' => 'Banco Mercantil do Brasil S.A.'],
            ['code' => '453', 'description' => 'Banco Rural S.A.'],
            ['code' => '422', 'description' => 'Banco Safra S.A.'],
            ['code' => '633', 'description' => 'Banco Rendimento S.A.']
        ];
    
        foreach ($items as $item) {
            DB::table('banks')->insert($item);
        }
    }
}
