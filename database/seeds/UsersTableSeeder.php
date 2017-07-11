<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'id_jenis_user'=>0,
            'name'=>'Administrator',
            'username'=>'admin',
            'password'=>bcrypt('admin'),
        ]);
    }
}
