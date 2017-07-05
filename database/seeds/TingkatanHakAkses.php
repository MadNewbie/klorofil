<?php

use Illuminate\Database\Seeder;

class TingkatanHakAkses extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tingkatan_hak_akses')->insert([
            'nama_tingkatan_hak_akses'=>'Semua',
            'nilai_tingkatan_hak_akses'=>0
        ]);
        DB::table('tingkatan_hak_akses')->insert([
            'nama_tingkatan_hak_akses'=>'Provinsi',
            'nilai_tingkatan_hak_akses'=>1
        ]);
        DB::table('tingkatan_hak_akses')->insert([
            'nama_tingkatan_hak_akses'=>'Kabupaten/Kota',
            'nilai_tingkatan_hak_akses'=>2
        ]);
        DB::table('tingkatan_hak_akses')->insert([
            'nama_tingkatan_hak_akses'=>'Kecamatan',
            'nilai_tingkatan_hak_akses'=>3
        ]);
        DB::table('tingkatan_hak_akses')->insert([
            'nama_tingkatan_hak_akses'=>'Kelurahan/Desa',
            'nilai_tingkatan_hak_akses'=>4
        ]);
        DB::table('tingkatan_hak_akses')->insert([
            'nama_tingkatan_hak_akses'=>'Area',
            'nilai_tingkatan_hak_akses'=>5
        ]);
    }
}
