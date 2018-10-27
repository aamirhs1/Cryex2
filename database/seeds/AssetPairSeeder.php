<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssetPairSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        DB::table('asset_pairs')->insert([
            'parent_id' => '1',
            'child_id' => '5',            
        ]);

         DB::table('asset_pairs')->insert([
            'parent_id' => '1',
            'child_id' => '6',            
        ]);

         DB::table('asset_pairs')->insert([
            'parent_id' => '1',
            'child_id' => '7',            
        ]);

         DB::table('asset_pairs')->insert([
            'parent_id' => '1',
            'child_id' => '8',            
        ]);

         DB::table('asset_pairs')->insert([
            'parent_id' => '1',
            'child_id' => '9',            
        ]);

         DB::table('asset_pairs')->insert([
            'parent_id' => '1',
            'child_id' => '10',            
        ]);

         DB::table('asset_pairs')->insert([
            'parent_id' => '1',
            'child_id' => '11',            
        ]);



         DB::table('asset_pairs')->insert([
            'parent_id' => '2',
            'child_id' => '5',            
        ]);

         DB::table('asset_pairs')->insert([
            'parent_id' => '2',
            'child_id' => '6',            
        ]);

         DB::table('asset_pairs')->insert([
            'parent_id' => '2',
            'child_id' => '7',            
        ]);

         DB::table('asset_pairs')->insert([
            'parent_id' => '2',
            'child_id' => '8',            
        ]);

         DB::table('asset_pairs')->insert([
            'parent_id' => '2',
            'child_id' => '9',            
        ]);

         DB::table('asset_pairs')->insert([
            'parent_id' => '2',
            'child_id' => '10',            
        ]);

         DB::table('asset_pairs')->insert([
            'parent_id' => '2',
            'child_id' => '11',            
        ]);




         DB::table('asset_pairs')->insert([
            'parent_id' => '3',
            'child_id' => '5',            
        ]);

         DB::table('asset_pairs')->insert([
            'parent_id' => '3',
            'child_id' => '6',            
        ]);

         DB::table('asset_pairs')->insert([
            'parent_id' => '3',
            'child_id' => '7',            
        ]);

         DB::table('asset_pairs')->insert([
            'parent_id' => '3',
            'child_id' => '8',            
        ]);

         DB::table('asset_pairs')->insert([
            'parent_id' => '3',
            'child_id' => '9',            
        ]);

         DB::table('asset_pairs')->insert([
            'parent_id' => '3',
            'child_id' => '10',            
        ]);

         DB::table('asset_pairs')->insert([
            'parent_id' => '3',
            'child_id' => '11',            
        ]);

        
        DB::table('asset_pairs')->insert([
            'parent_id' => '4',
            'child_id' => '5',            
        ]);

         DB::table('asset_pairs')->insert([
            'parent_id' => '4',
            'child_id' => '6',            
        ]);

         DB::table('asset_pairs')->insert([
            'parent_id' => '4',
            'child_id' => '7',            
        ]);

         DB::table('asset_pairs')->insert([
            'parent_id' => '4',
            'child_id' => '8',            
        ]);

         DB::table('asset_pairs')->insert([
            'parent_id' => '4',
            'child_id' => '9',            
        ]);

         DB::table('asset_pairs')->insert([
            'parent_id' => '4',
            'child_id' => '10',            
        ]);

         DB::table('asset_pairs')->insert([
            'parent_id' => '4',
            'child_id' => '11',            
        ]);
    }
}
