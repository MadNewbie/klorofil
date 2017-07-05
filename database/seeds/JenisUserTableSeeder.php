<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('jenis_user')->insert([
            'nama_jenis_akun'=>'Administrator'
        ]);
        DB::table('jenis_user')->insert([
            'nama_jenis_akun'=>'Operator (Provinsi)'
        ]);
        DB::table('jenis_user')->insert([
            'nama_jenis_akun'=>'Operator (Kabupaten/Kota)'
        ]);
        DB::table('jenis_user')->insert([
            'nama_jenis_akun'=>'Operator (Kecamatan)'
        ]);
        DB::table('jenis_user')->insert([
            'nama_jenis_akun'=>'Operator (Kelurahan/Desa)'
        ]);
        DB::table('jenis_user')->insert([
            'nama_jenis_akun'=>'Operator (Area)'
        ]);
    }
}
