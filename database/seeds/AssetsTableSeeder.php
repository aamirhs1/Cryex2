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
            'name' => 'TRON',
            'symbol' => 'TRX',
            'minAllowed' => 0.0005,
        ]);

        DB::table('assets')->insert([
            'name' => 'WaltonChain',
            'symbol' => 'WTC',
            'minAllowed' => 0.0005,
        ]);

        DB::table('assets')->insert([
            'name' => 'NEO',
            'symbol' => 'NEO',
            'minAllowed' => 0.0005,
        ]);

        DB::table('assets')->insert([
            'name' => 'IOTA',
            'symbol' => 'IOTA',
            'minAllowed' => 0.0005,
        ]);

        DB::table('assets')->insert([
            'name' => 'NANO',
            'symbol' => 'NANO',
            'minAllowed' => 0.0005,
        ]);

        DB::table('assets')->insert([
            'name' => 'Cardano',
            'symbol' => 'ADA',
            'minAllowed' => 0.0005,
        ]);

        DB::table('assets')->insert([
            'name' => 'VeChain',
            'symbol' => 'VEN',
            'minAllowed' => 0.0005,
        ]);
    }
}
