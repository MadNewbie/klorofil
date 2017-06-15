<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware'=>['web']],function(){
    
   Route::get('/', function () {
    return view('test-front-end');
   });
   
   Route::get('/osmtest',function(){
       return view('test-osm');
   });
   
   Route::get('/gmap',function(){
       return view('test-gmap');
   });
   
   Route::group(['prefix'=>'admin'],function(){
       
       //Menu Dashboard
       Route::get('/',[
          'uses'=>'AdminController@getIndex',
          'as'=>'admin.index'
       ]);
       
       //Menu Provinsi
       Route::get('/provinsi/',[
           'uses'=>'ProvinsiController@getIndex',
           'as'=>'provinsi.index'
       ]);
       
       //Menu Kabupaten Kota
       Route::get('/kabupaten_kota/',[
           'uses'=>'KabupatenKotaController@getIndex',
           'as'=>'kabupaten_kota.index'
       ]);
       
       //Menu Kecamatan
       Route::get('/kecamatan/',[
           'uses'=>'KecamatanController@getIndex',
           'as'=>'kecamatan.index'
       ]);
       
       //Menu Kelurahan Desa
       Route::get('/kelurahan_desa/',[
           'uses'=>'KelurahanDesaController@getIndex',
           'as'=>'kelurahan_desa.index'
       ]);
       
       //Menu Area
       Route::get('/area/',[
          'uses'=>'AreaController@getIndex',
           'as'=>'area.index'
       ]);
       
       //Menu Nama Ilmiah
       Route::get('/nama_ilmiah/',[
          'uses'=>'NamaIlmiahController@getIndex',
          'as'=>'nama_ilmiah.index'
       ]);
       
       //Menu Nama Lokal
       Route::get('/nama_lokal/',[
           'uses'=>'NamaLokalController@getIndex',
           'as'=>'nama_lokal.index'
       ]);
       
       //Menu Pertumbuhan
       Route::get('/pertumbuhan/',[
          'uses'=>'PertumbuhanController@getIndex' ,
          'as'=>'pertumbuhan.index'
       ]);
       
       //Menu Daun
       Route::get('/daun/',[
          'uses'=>'DaunController@getIndex',
          'as'=>'daun.index'
       ]);
       
       //Menu Cabang
       Route::get('/cabang/',[
           'uses'=>'CabangController@getIndex',
           'as'=>'cabang.index'
       ]);
       
       //Menu Bunga
       Route::get('/bunga/',[
          'uses'=>'BungaController@getIndex',
          'as'=>'bunga.index'
       ]);
       
       //Menu Habitat
       Route::get('/habitat/',[
          'uses'=>'HabitatController@getIndex',
          'as'=>'habitat.index'
       ]);
       
       //Menu Jenis Perlakuan
       Route::get('/jenis_perlakuan/',[
           'uses'=>'JenisPerlakuanController@getIndex',
           'as'=>'jenis_perlakuan.index'
       ]);
       
       //Menu Perlakuan
       Route::get('/perlakuan/',[
           'uses'=>'PerlakuanController@getIndex',
           'as'=>'perlakuan.index'
       ]);
       
       //Menu Jenis Penyakit
       Route::get('/jenis_penyakit/',[
           'uses'=>'JenisPenyakitController@getIndex',
           'as'=>'jenis_penyakit.index'
       ]);
       
       //Menu Penyakit
       Route::get('/penyakit/',[
           'uses'=>'PenyakitController@getIndex',
           'as'=>'penyakit.index'
       ]);
       
       //Menu Jenis Akun
       Route::get('/jenis_akun/',[
          'uses'=>'JenisAkunController@getIndex',
          'as'=>'jenis_akun.index'
       ]);
       
       //Menu akun
       Route::get('/akun/',[
          'uses'=>'AkunController@getIndex',
          'as'=>'akun.index'
       ]);
       
   });
   
});