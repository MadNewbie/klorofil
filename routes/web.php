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
Route::get('/',function () {
    return view('front-end.homescreen');
})->name('web.home');

Route::group(['prefix'=>'guest'],function(){
    Route::get('/',[
       'uses'=>'GuestController@getIndex',
       'as'=>'guest.index'
   ]);
});

Route::get('/osmtest',function(){
    return view('test-osm');
});

Route::get('/gmap',function(){
    return view('test-gmap');
});
       
Route::group(['middleware'=>['auth']], function (){
    Route::group(['middleware'=>['web']],function(){
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

           Route::post('/nama_ilmiah/create',[
               'uses'=>'NamaIlmiahController@postCreateNamaIlmiah',
               'as'=>'nama_ilmiah.create'
           ]);

           Route::post('/nama_ilmiah/update',[
               'uses'=>'NamaIlmiahController@postUpdateNamaIlmiah',
               'as'=>'nama_ilmiah.update'
           ]);

           Route::get('/nama_ilmiah/{id_nama_ilmiah}/delete',[
               'uses'=>'NamaIlmiahController@getDeleteNamaIlmiah',
               'as'=>'nama_ilmiah.delete'
           ]);

           Route::get('/nama_ilmiah/get',[
               'uses' => 'NamaIlmiahController@getNamaIlmiah',
               'as' => 'nama_ilmiah.get'
           ]);

           //Menu Nama Lokal
           Route::get('/nama_lokal/',[
               'uses'=>'NamaLokalController@getIndex',
               'as'=>'nama_lokal.index'
           ]);

           Route::post('/nama_lokal/create',[
               'uses'=>'NamaLokalController@postCreateNamaLokal',
               'as'=>'nama_lokal.create'
           ]);

           Route::post('/nama_lokal/update',[
               'uses'=>'NamaLokalController@postUpdateNamaLokal',
               'as'=>'nama_lokal.update'
           ]);

           Route::get('/nama_lokal/{id_nama_lokal}/delete',[
               'uses'=>'NamaLokalController@getDeleteNamaLokal',
               'as'=>'nama_lokal.delete'
           ]);

           Route::get('/nama_lokal/get/',[
               'uses'=>'NamaLokalController@getNamaLokal',
               'as'=>'nama_lokal.get'
           ]);

           //Menu Pertumbuhan
           Route::get('/pertumbuhan/',[
              'uses'=>'PertumbuhanController@getIndex' ,
              'as'=>'pertumbuhan.index'
           ]);

           Route::post('/pertumbuhan/create',[
              'uses'=>'PertumbuhanController@postCreatePertumbuhan' ,
              'as'=>'pertumbuhan.create'
           ]);

           Route::post('/pertumbuhan/update',[
               'uses'=>'PertumbuhanController@postUpdatePertumbuhan',
               'as'=>'pertumbuhan.update'
           ]);

           Route::get('/pertumbuhan/{id_pertumbuhan}/delete',[
               'uses'=>'PertumbuhanController@getDeletePertumbuhan',
               'as'=>'pertumbuhan.delete'
           ]);

           //Menu Daun
           Route::get('/daun/',[
              'uses'=>'DaunController@getIndex',
              'as'=>'daun.index'
           ]);

           Route::post('/daun/create',[
               'uses'=> 'DaunController@postCreateDaun',
               'as'=>'daun.create'
           ]);

           Route::post('/daun/update',[
               'uses'=>'DaunController@postUpdateDaun',
               'as'=>'daun.update'
           ]);

           Route::get('/daun/{id_daun}/delete',[
               'uses'=>'DaunController@getDeleteDaun',
               'as'=>'daun.delete'
           ]);

           //Menu Cabang
           Route::get('/cabang/',[
               'uses'=>'CabangController@getIndex',
               'as'=>'cabang.index'
           ]);

           Route::post('/cabang/create',[
               'uses'=>'CabangController@postCreateCabang',
               'as'=>'cabang.create'
           ]);

           Route::post('/cabang/update',[
               'uses'=>'CabangController@postUpdateCabang',
               'as'=>'cabang.update'
           ]);

           Route::get('/cabang/{id_cabang}/delete',[
               'uses'=>'CabangController@getDeleteCabang',
               'as'=>'cabang.delete'
           ]);

           //Menu Bunga
           Route::get('/bunga/',[
              'uses'=>'BungaController@getIndex',
              'as'=>'bunga.index'
           ]);

           Route::post('/bunga/create',[
               'uses'=>'BungaController@postCreateBunga',
               'as'=>'bunga.create'
           ]);

           Route::post('/bunga/update',[
               'uses'=>'BungaController@postUpdateBunga',
               'as'=>'bunga.update'
           ]);

           Route::get('/bunga/{id_cabang}/delete',[
               'uses'=>'BungaController@getDeleteBunga',
               'as'=>'bunga.delete'
           ]);

           //Menu Habitat
           Route::get('/habitat/',[
              'uses'=>'HabitatController@getIndex',
              'as'=>'habitat.index'
           ]);

           Route::post('/habitat/create',[
              'uses'=>'HabitatController@postCreateHabitat',
              'as'=>'habitat.create'
           ]);

           Route::post('/habitat/update',[
               'uses'=>'HabitatController@postUpdateHabitat',
               'as'=>'habitat.update'
           ]);

           Route::get('/habitat/{id_habitat}/delete',[
               'uses'=>'HabitatController@getDeleteHabitat',
               'as'=>'habitat.delete'
           ]);

           //Menu Jenis Perlakuan
           Route::get('/jenis_perlakuan/',[
               'uses'=>'JenisPerlakuanController@getIndex',
               'as'=>'jenis_perlakuan.index'
           ]);

           Route::post('/jenis_perlakuan/create',[
               'uses'=>'JenisPerlakuanController@postCreateJenisPerlakuan',
               'as'=>'jenis_perlakuan.create'
           ]);

           Route::post('/jenis_perlakuan/update',[
               'uses'=>'JenisPerlakuanController@postUpdateJenisPerlakuan',
               'as'=>'jenis_perlakuan.update'
           ]);

           Route::get('/jenis_perlakuan/{id_jenis_perlakuan}/delete',[
               'uses'=>'JenisPerlakuanController@getDeleteJenisPerlakuan',
               'as'=>'jenis_perlakuan.delete'
           ]);

           Route::get('/jenis_perlakuan/get',[
               'uses'=>'JenisPerlakuanController@getJenisPerlakuan',
               'as'=>'jenis_perlakuan.get'
           ]);

           //Menu Perlakuan
           Route::get('/perlakuan/',[
               'uses'=>'PerlakuanController@getIndex',
               'as'=>'perlakuan.index'
           ]);

           Route::post('/perlakuan/create',[
               'uses'=> 'PerlakuanController@postCreatePerlakuan',
               'as'=>'perlakuan.create'
           ]);

           Route::post('/perlakuan/update',[
               'uses'=> 'PerlakuanController@postUpdatePerlakuan',
               'as'=>'perlakuan.update'
           ]);

           Route::get('/perlakuan/{id_perlakuan}/delete',[
               'uses'=> 'PerlakuanController@getDeletePerlakuan',
               'as'=>'perlakuan.delete'
           ]);

           Route::get('/perlakuan/get',[
               'uses'=> 'PerlakuanController@getPerlakuan',
               'as'=>'perlakuan.get'
           ]);

           //Menu Jenis Penyakit
           Route::get('/jenis_penyakit/',[
               'uses'=>'JenisPenyakitController@getIndex',
               'as'=>'jenis_penyakit.index'
           ]);

           Route::post('/jenis_penyakit/create',[
               'uses'=>'JenisPenyakitController@postCreateJenisPenyakit',
               'as'=>'jenis_penyakit.create'
           ]);

           Route::post('/jenis_penyakit/update',[
               'uses'=>'JenisPenyakitController@postUpdateJenisPenyakit',
               'as'=>'jenis_penyakit.update'
           ]);

           Route::get('/jenis_penyakit/{id_jenis_penyakit}/delete',[
               'uses'=>'JenisPenyakitController@getDeleteJenisPenyakit',
               'as'=>'jenis_penyakit.delete'
           ]);

           Route::get('/jenis_penyakit/get',[
               'uses'=>'JenisPenyakitController@getJenisPenyakit',
               'as'=>'jenis_penyakit.get'
           ]);

           //Menu Penyakit
           Route::get('/penyakit/',[
               'uses'=>'PenyakitController@getIndex',
               'as'=>'penyakit.index'
           ]);

           Route::post('/penyakit/create',[
               'uses'=>'PenyakitController@postCreatePenyakit',
               'as'=>'penyakit.create'
           ]);

           Route::post('/penyakit/update',[
               'uses'=>'PenyakitController@postUpdatePenyakit',
               'as'=>'penyakit.update'
           ]);

           Route::get('/penyakit/{id_penyakit}/delete',[
               'uses'=>'PenyakitController@getDeletePenyakit',
               'as'=>'penyakit.delete'
           ]);

           Route::get('/penyakit/get',[
               'uses'=>'PenyakitController@getPenyakit',
               'as'=>'penyakit.get'
           ]);       

           //Menu Jenis Wilayah Akun
           Route::get('/jenis_wilayah_akun/',[
               'uses'=>'JenisWilayahUserController@getIndex',
               'as'=>'jenis_wilayah_akun.index'
           ]);

           Route::post('/jenis_wilayah_akun/create',[
               'uses'=> 'JenisWilayahUserController@postCreateJenisWilayahUser',
               'as'=>'jenis_wilayah_akun.create'
           ]);

           Route::post('/jenis_wilayah_akun/update',[
               'uses'=>'JenisWilayahUserController@postUpdateJenisWilayahUser',
               'as'=>'jenis_wilayah_akun.update'
           ]);

           Route::get('/jenis_wilayah_akun/{id_jenis_wilayah_user}/delete',[
               'uses'=>'JenisWilayahUserController@getDeleteJenisWilayahUser',
               'as'=>'jenis_wilayah_akun.delete'
           ]);

           Route::get('/jenis_wilayah_akun/get/',[
               'uses'=>'JenisWilayahUserController@getJenisWilayahUser',
               'as'=>'jenis_wilayah_akun.get'
           ]);

           //Menu Jenis Akun
           Route::get('/jenis_akun/',[
              'uses'=>'JenisAkunController@getIndex',
              'as'=>'jenis_akun.index'
           ]);

           Route::post('/jenis_akun/create',[
              'uses'=>'JenisAkunController@postCreateJenisAkun',
              'as'=>'jenis_akun.create'
           ]);

           Route::post('/jenis_akun/update',[
              'uses'=>'JenisAkunController@postUpdateJenisAkun',
              'as'=>'jenis_akun.update'
           ]);

            Route::get('/jenis_akun/{id_jenis_akun}/delete',[
               'uses'=>'JenisAkunController@getDeleteJenisAkun',
               'as'=>'jenis_akun.delete'
           ]);


           //Menu Akun
           Route::get('/akun/',[
              'uses'=>'AkunController@getIndex',
              'as'=>'akun.index'
           ]);

           Route::post('/akun/create',[
               'uses'=>'AkunController@postCreateAkun',
               'as'=>'akun.create'
           ]);

           Route::post('/akun/update',[
               'uses'=>'AkunController@postUpdateAkun',
               'as'=>'akun.update'
           ]);

           Route::get('/akun/{id_akun}/delete',[
               'uses'=>'AkunController@getDeleteAkun',
               'as'=>'akun.delete'
           ]);      
       });
    //   Route::group(['prefix'=>'operator',function(){
    //       
    //   }]);
    //   
    //   Route::group(['prefix'=>'surveyor',function(){
    //       
    //   }]);
    });
});

Auth::routes();

Route::auth();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

//Route::get('/home', 'HomeController@index')->name('home');
