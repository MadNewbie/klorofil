<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = [
            [
                'name'=>'master-create',
                'display_name'=>'Membuat data master',
                'description'=>'Membuat data jenis pertumbuhan, jenis daun, jenis cabang, jenis bunga, jenis akar, jenis batang, jenis perlakuan, jenis penyakit, penyakit, perlakuan atau habitat baru'
            ],
            [
                'name'=>'master-retrieve',
                'display_name'=>'Menampilkan data master',
                'description'=>'Menampilkan data jenis pertumbuhan, jenis daun, jenis cabang, jenis bunga, jenis akar, jenis batang, jenis perlakuan, jenis penyakit, penyakit, perlakuan atau habitat'
            ],
            [
                'name'=>'master-update',
                'display_name'=>'Memperbarui data master',
                'description'=>'Memperbarui data jenis pertumbuhan, jenis daun, jenis cabang, jenis bunga, jenis akar, jenis batang, jenis perlakuan, jenis penyakit, penyakit, perlakuan atau habitat'
            ],
            [
                'name'=>'master-delete',
                'display_name'=>'Menghapus data master',
                'description'=>'Menghapus data jenis pertumbuhan, jenis daun, jenis cabang, jenis bunga, jenis akar, jenis batang, jenis perlakuan, jenis penyakit, penyakit, perlakuan atau habitat'
            ],
            [
                'name'=>'nama_ilmiah-create',
                'display_name'=>'Membuat data nama ilmiah baru',
                'description'=>'Membuat data nama ilmiah baru'
            ],
            [
                'name'=>'nama_ilmiah-retrieve',
                'display_name'=>'Menampilkan data nama ilmiah',
                'description'=>'Menampilkan data nama ilmiah'
            ],
            [
                'name'=>'nama_ilmiah-update',
                'display_name'=>'Memperbarui data nama ilmiah',
                'description'=>'Memperbarui data nama ilmiah'
            ],
            [
                'name'=>'nama_ilmiah-delete',
                'display_name'=>'Menghapus data nama ilmiah',
                'description'=>'Menghapus data nama ilmiah'
            ],
            [
                'name'=>'nama_lokal-create',
                'display_name'=>'Membuat data nama lokal baru',
                'description'=>'Membuat data nama lokal baru'
            ],
            [
                'name'=>'nama_lokal-retrieve',
                'display_name'=>'Menampilkan data nama lokal',
                'description'=>'Menampilkan data nama lokal'
            ],
            [
                'name'=>'nama_lokal-update',
                'display_name'=>'Memperbarui data nama lokal',
                'description'=>'Memperbarui data nama lokal'
            ],
            [
                'name'=>'nama_lokal-delete',
                'display_name'=>'Menghapus data nama lokal',
                'description'=>'Menghapus data nama lokal'
            ],
            [
                'name'=>'provinsi-create',
                'display_name'=>'Membuat data provinsi baru',
                'description'=>'Membuat data provinsi baru'
            ],
            [
                'name'=>'provinsi-retrieve',
                'display_name'=>'Menampilkan data provinsi',
                'description'=>'Menampilkan data provinsi'
            ],
            [
                'name'=>'provinsi-update',
                'display_name'=>'Mengubah data provinsi',
                'description'=>'Mengubah data provinsi'
            ],
            [
                'name'=>'provinsi-delete',
                'display_name'=>'Menghapus data provinsi',
                'description'=>'Menghapus data provinsi'
            ],
            [
                'name'=>'kabupaten_kota-create',
                'display_name'=>'Membuat data kabupaten kota baru',
                'description'=>'Membuat data kabupaten kota baru'
            ],
            [
                'name'=>'kabupaten_kota-retrieve',
                'display_name'=>'Menampilkan data kabupaten kota',
                'description'=>'Menampilkan data kabupaten kota'
            ],
            [
                'name'=>'kabupaten_kota-update',
                'display_name'=>'Mengubah data kabupaten kota',
                'description'=>'Mengubah data kabupaten kota'
            ],
            [
                'name'=>'kabupaten_kota-delete',
                'display_name'=>'Menghapus data kabupaten kota',
                'description'=>'Menghapus data kabupaten kota'
            ],
            [
                'name'=>'kecamatan-create',
                'display_name'=>'Membuat data kecamatan baru',
                'description'=>'Membuat data kecamatan baru'
            ],
            [
                'name'=>'kecamatan-retrieve',
                'display_name'=>'Menampilkan data kecamatan',
                'description'=>'Menampilkan data kecamatan'
            ],
            [
                'name'=>'kecamatan-update',
                'display_name'=>'Mengubah data kecamatan',
                'description'=>'Mengubah data kecamatan'
            ],
            [
                'name'=>'kecamatan-delete',
                'display_name'=>'Menghapus data kecamatan',
                'description'=>'Menghapus data kecamatan'
            ],
            [
                'name'=>'kelurahan_desa-create',
                'display_name'=>'Membuat data kelurahan_desa baru',
                'description'=>'Membuat data kelurahan_desa baru'
            ],
            [
                'name'=>'kelurahan_desa-retrieve',
                'display_name'=>'Menampilkan data kelurahan_desa',
                'description'=>'Menampilkan data kelurahan_desa'
            ],
            [
                'name'=>'kelurahan_desa-update',
                'display_name'=>'Mengubah data kelurahan_desa',
                'description'=>'Mengubah data kelurahan_desa'
            ],
            [
                'name'=>'kelurahan_desa-delete',
                'display_name'=>'Menghapus data kelurahan_desa',
                'description'=>'Menghapus data kelurahan_desa'
            ],
            [
                'name'=>'area-create',
                'display_name'=>'Membuat data area baru',
                'description'=>'Membuat data area baru'
            ],
            [
                'name'=>'area-retrieve',
                'display_name'=>'Menampilkan data area',
                'description'=>'Menampilkan data area'
            ],
            [
                'name'=>'area-update',
                'display_name'=>'Mengubah data area',
                'description'=>'Mengubah data area'
            ],
            [
                'name'=>'area-delete',
                'display_name'=>'Menghapus data area',
                'description'=>'Menghapus data area'
            ]
        ];
        foreach ($permission as $key=>$value){
            Permission::create($value);
        }
    }
}
