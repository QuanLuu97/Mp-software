<?php

use Illuminate\Database\Seeder;

class bill extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           DB::table('bill')->insert([
            [ 'name'=>'hd6' ,  'id_users'=> rand(1,5) ],
            [ 'name'=>'hd7' ,  'id_users'=> rand(1,5) ],
            [ 'name'=>'hd8' ,  'id_users'=> rand(1,5) ],
            [ 'name'=>'hd9' ,  'id_users'=> rand(1,5) ],
            [ 'name'=>'hd10' , 'id_users'=> rand(1,5) ],

            
        ]);    }
}
