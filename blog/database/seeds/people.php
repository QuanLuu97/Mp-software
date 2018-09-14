<?php

use Illuminate\Database\Seeder;

class people extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('people')->insert([
        	[
        		'name' => 'Quan',
        		'address' => 'HungYen',
        		'age' => '21'
        	],
        	[
        		'name' => 'Le',
        		'address' => 'HoaBinh',
        		'age' => '21'
        	]
        ]); 
    }
}
