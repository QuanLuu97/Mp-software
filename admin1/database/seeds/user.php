<?php

use Illuminate\Database\Seeder;

class user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	 
        DB::table('users')->insert([
            [ 'name' => 'Quan', 'email' => 'lxquanit@gmail.com', 'password' => bcrypt(123456)]
    	]);
    }
}
