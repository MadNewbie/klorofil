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
            'nama_jenis_akun'=>'Administrator',
            'id_tingkatan_hak_akses'=>1
        ]);
        DB::table('jenis_user')->insert([
            'nama_jenis_akun'=>'Operator (Provinsi)',
            'id_tingkatan_hak_akses'=>2
        ]);
        DB::table('jenis_user')->insert([
            'nama_jenis_akun'=>'Operator (Kabupaten/Kota)',
            'id_tingkatan_hak_akses'=>3
        ]);
        DB::table('jenis_user')->insert([
            'nama_jenis_akun'=>'Operator (Kecamatan)',
            'id_tingkatan_hak_akses'=>4
        ]);
        DB::table('jenis_user')->insert([
            'nama_jenis_akun'=>'Operator (Kelurahan/Desa)',
            'id_tingkatan_hak_akses'=>5
        ]);
        DB::table('jenis_user')->insert([
            'nama_jenis_akun'=>'Operator (Area)',
            'id_tingkatan_hak_akses'=>6
        ]);
    }
}
