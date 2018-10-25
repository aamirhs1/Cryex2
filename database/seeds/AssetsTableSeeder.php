<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
         DB::table('assets')->insert([
            'name' => 'Bitcoin',
            'symbol' => 'BTC',
            'minAllowed' => 0.0005,
        ]);

        DB::table('assets')->insert([
            'name' => 'Litecoin',
            'symbol' => 'LTC',
            'minAllowed' => 0.0005,
        ]);

        DB::table('assets')->insert([
            'name' => 'Ethereum',
            'symbol' => 'ETH',
            'minAllowed' => 0.0005,
        ]);

        DB::table('assets')->insert([
            'name' => 'Tether',
            'symbol' => 'USDT',
            'minAllowed' => 0.0005,
        ]);

        DB::table('assets')->insert([
            'name' => 'Nano',
            'symbol' => 'NANO',
            'minAllowed' => 0.0005,
        ]);

        DB::table('assets')->insert([
            'name' => 'Horizen',
            'symbol' => 'ZEN',
            'minAllowed' => 0.0005,
        ]);

        DB::table('assets')->insert([
            'name' => 'NEO',
            'symbol' => 'NEO',
            'minAllowed' => 0.0005,
        ]);

        DB::table('assets')->insert([
            'name' => 'EOS',
            'symbol' => 'EOS',
            'minAllowed' => 0.0005,
        ]);

        DB::table('assets')->insert([
            'name' => 'TRON',
            'symbol' => 'TRX',
            'minAllowed' => 0.0005,
        ]);

        DB::table('assets')->insert([
            'name' => 'Cardano',
            'symbol' => 'ADA',
            'minAllowed' => 0.0005,
        ]);

        DB::table('assets')->insert([
            'name' => 'VeChain',
            'symbol' => 'VET',
            'minAllowed' => 0.0005,
        ]);
    }
}
