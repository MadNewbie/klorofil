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
//=============================
// Guest-page section
//=============================

Route::get('/',[
    'uses'=>'HomeController@getGuestIndex',
    'as'=>'guest.index'
]);

//=============================
// End Guest-page section
//=============================

//=============================
// Ministered-page section
//=============================
Route::get('/price-and-planning', [
  'uses' => 'HomeController@getMinisteredIndex',
  'as' => 'ministered.index'
]);

//=============================
// End Ministered-page section
//=============================

//=============================
// Blog-page section
//=============================
Route::get('/blog', [
  'uses' => 'HomeController@getBlogIndex',
  'as' => 'blog.index'
]);

//=============================
// End Blog-page section
//=============================

Route::get('/osmtest',function(){
    return view('test-osm');
});

Route::get('/gmap',function(){
    return view('test-gmap');
});


//'auth',

//Auth::routes();

Route::group(['middleware'=>['web']],function(){
       Route::group(['prefix'=>'admin'],function(){
         //============================
         // Admin-page section
         //============================
         // Menu Dashboard
         Route::get('/',[
            'uses'=>'HomeController@getAdminIndex',
            'as'=>'admin.index'
         ]);

         //============================
         // End Admin-page section
         //============================

         //============================
         //Admin region section
         //============================
         //============================
         // Sublist Admin region
         //============================
         // Submenu Negara
         Route::get('/negara',[
              'uses'=>'NegaraController@getIndex',
              'as'=>'negara.index'
         ]);

         Route::get('/negara/create',[
              'uses'=>'NegaraController@getCreate',
              'as'=>'negara.getCreate'
          ]);

         Route::post('/negara/create',[
              'uses'=>'NegaraController@postCreate',
              'as'=>'negara.create'
          ]);

         Route::get('/negara/retrieve',[
              'uses'=>'NegaraController@getRetrieve',
              'as'=>'negara.retrieve'
          ]);

         // Submenu Provinsi
         Route::get('/provinsi',[
             'uses'=>'ProvinsiController@getIndex',
             'as'=>'provinsi.index'
         ]);

         Route::get('/provinsi/create',[
             'uses'=>'ProvinsiController@getCreate',
             'as'=>'provinsi.getCreate'
         ]);

         Route::post('/provinsi/create',[
             'uses'=>'ProvinsiController@postCreate',
             'as'=>'provinsi.Create'
         ]);

         // Submenu Kabupaten-Kota
         Route::get('/kabupaten-kota',[
           'uses'=>'KabKotaController@getIndex',
           'as'=>'kabkota.index'
         ]);

         Route::get('/kabupaten-kota/create',[
           'uses'=>'KabKotaController@getCreate',
           'as'=>'kabkota.getCreate'
         ]);

         Route::post('/kabupaten-kota/create',[
           'uses'=>'KabKotaController@postCreate',
           'as'=>'kabkota.Create'
         ]);

         // Submenu Kecamatan
         Route::get('/kecamatan',[
           'uses'=>'KecamatanController@getIndex',
           'as'=>'kecamatan.index'
         ]);

         // Submenu Kelurahan-Desa
         Route::get('/kelurahan-desa',[
           'uses'=>'KelDesaController@getIndex',
           'as'=>'kelurahandesa.index'
         ]);
         
         //Submenu Area
         Route::get('/area',[
             'uses'=>'AreasController@getIndex',
             'as'=>'area.index'
         ]);

         //=============================
         // End Admin region section
         //=============================


           //Menu Plant General
            Route::get('plant_general',[
                'uses'=>'PlantGeneralController@getIndex',
                'as'=>'plantgeneral.index'
            ]);

            Route::get('plant_general/create',[
                'uses'=>'PlantGeneraController@getCreate',
                'as'=>'plantgeneral.getCreate'
            ]);

            Route::post('plant_general/create',[
                'uses'=>'PlantGeneralController@postCreate',
                'as'=>'plantgeneral.create'
            ]);

            Route::get('plant_general/retrieve',[
                'uses'=>'PlantGeneralController@getRetrieve',
                'as'=>'plantgeneral.retrieve'
            ]);

            //Menu Plant Treatment
            Route::get('/plant_treatment',[
                'uses'=>'PlantTreatmentController@getIndex',
                'as'=>'planttreatment.index'
            ]);

            Route::get('/plant_treatment/create',[
                'uses'=>'PlantTreatmentController@getCreate',
                'as'=>'planttreatment.getCreate'
            ]);

            Route::post('/plant_treatment/create',[
                'uses'=>'PlantTreatmentController@postCreate',
                'as'=>'planttreatment.create'
            ]);

            Route::get('/plant_treatment/retrieve',[
                'uses'=>'PlantTreatmentController@getRetrieve',
                'as'=>'planttreatment.retrieve'
            ]);

            //Menu Common Name
            Route::get('/common_name',[
                'uses'=>'CommonNameController@getIndex',
                'as'=>'commonname.index']);

            Route::get('/common_name/create',[
                'uses'=>'CommonNameController@getCreate',
                'as'=>'commonname.getCreate']);

            Route::post('/common_name/create',[
                'uses'=>'CommonNameController@postCreate',
                'as'=>'commonname.create']);

            Route::get('/common_name/retrive',[
                'uses'=>'CommonNameController@getRetrive',
                'as'=>'commonname.retrieve']);

            Route::get('/species',[
                'uses'=>'SpeciesController@getIndex',
                'as'=>'species.index'
            ]);

            //Menu Species
            Route::get('/species/create',[
                'uses'=>'SpeciesController@getCreate',
                'as'=>'species.getCreate'
            ]);

            Route::post('/species/create',[
                'uses'=>'SpeciesController@postCreate',
                'as'=>'species.create'
            ]);

            Route::get('/species/retrieve/{id?}',[
                'uses'=>'SpeciesController@getRetrieve',
                'as'=>'species.retrieve'
            ]);
            
            Route::post('/species/update',[
                'uses'=>'SpeciesController@postUpdate',
                'as'=>'species.update'
            ]);
            
            Route::get('/species/{id}/delete',[
                'uses'=>'SpeciesController@getDelete',
                'as'=>'species.delete'
            ]);
            
            //Menu Provinsi
            Route::get('/provinsi',[
                'uses'=>'ProvinsiController@getIndex',
                'as'=>'provinsi.index'
            ]);

           //Menu Treatment
           Route::get('/treatment',[
                'uses'=>'TreatmentController@getIndex',
                'as'=>'treatment.index'
            ]);

            Route::get('/treatment/create',[
                'uses'=>'TreatmentController@getCreate',
                'as'=>'treatment.getCreate'
            ]);

            Route::post('/treatment/create',[
                'uses'=>'TreatmentController@postCreate',
                'as'=>'treatment.create'
            ]);

            Route::post('/treatment/update',[
                'uses'=>'TreatmentController@postUpdate',
                'as'=>'treatment.update'
            ]);

            Route::get('/treatment/{id}/delete',[
                'uses'=>'TreatmentController@getDelete',
                'as'=>'treatment.delete'
            ]);

           //Menu Disease
            Route::get('/disease',[
                'uses'=>'DiseaseController@getIndex',
                'as'=>'disease.index'
            ]);

            Route::get('/disease/create',[
                'uses'=>'DiseaseController@getCreate',
                'as'=>'disease.getCreate'
            ]);

            Route::post('/disease/create',[
                'uses'=>'DiseaseController@postCreate',
                'as'=>'disease.create'
            ]);

            Route::post('/disease/update',[
                'uses'=>'DiseaseController@postUpdate',
                'as'=>'disease.update'
            ]);

            Route::get('/disease/{id}/delete',[
                'uses'=>'DiseaseController@getDelete',
                'as'=>'disease.delete'
            ]);

           //Menu Disease Type
           Route::get('/disease_type',[
                'uses'=>'DiseaseTypeController@getIndex',
                'as'=>'diseasetype.index'
            ]);

            Route::get('/disease_type/create',[
                'uses'=>'DiseaseTypeController@getCreate',
                'as'=>'diseasetype.getCreate'
            ]);

            Route::post('/disease_type/create',[
                'uses'=>'DiseaseTypeController@postCreate',
                'as'=>'diseasetype.create'
            ]);

            Route::get('/disease_type/retrieve/{species_type_id?}',[
                'uses'=>'DiseaseTypeController@getRetrieve',
                'as'=>'diseasetype.retrieve'
            ]);

            Route::post('/disease_type/update/',[
                'uses'=>'DiseaseTypeController@postUpdate',
                'as'=>'diseasetype.update'
            ]);

            Route::get('/disease_type/{id}/delete',[
                'uses'=>'DiseaseTypeController@getDelete',
                'as'=>'diseasetype.delete'
            ]);

           //Menu Function Type Species
           Route::get('/function_type',[
                'uses'=>'FunctionTypeController@getIndex',
                'as'=>'functiontype.index'
            ]);

            Route::get('/function_type/create',[
                'uses'=>'FunctionTypeController@getCreate',
                'as'=>'functiontype.getCreate'
            ]);

            Route::post('/function_type/create',[
                'uses'=>'FunctionTypeController@postCreate',
                'as'=>'functiontype.create'
            ]);

            Route::get('/function_type/retrieve',[
                'uses'=>'FunctionTypeController@getRetrieve',
                'as'=>'functiontype.retrieve'
            ]);

            Route::post('/function_type/update',[
                'uses'=>'FunctionTypeController@postUpdate',
                'as'=>'functiontype.update'
            ]);

            Route::get('/function_type/{id}/delete',[
                'uses'=>'FunctionTypeController@getDelete',
                'as'=>'functiontype.delete'
            ]);

           //Menu Species Type
           Route::get('/species_type',[
                'uses'=>'SpeciesTypeController@getIndex',
                'as'=>'speciestype.index'
            ]);

            Route::get('/species_type/create',[
                'uses'=>'SpeciesTypeController@getCreate',
                'as'=>'speciestype.getCreate'
            ]);

            Route::post('/species_type/create',[
                'uses'=>'SpeciesTypeController@postCreate',
                'as'=>'speciestype.create'
            ]);

            Route::get('/species_type/retrieve',[
                'uses'=>'SpeciesTypeController@getRetrieve',
                'as'=>'speciestype.retrieve'
            ]);

            Route::post('/species_type/update',[
                'uses'=>'SpeciesTypeController@postUpdate',
                'as'=>'speciestype.update'
            ]);

            Route::get('/species_type/{id}/delete',[
                'uses'=>'SpeciesTypeController@getDelete',
                'as'=>'speciestype.delete'
            ]);

           //Menu Habitat
           Route::get('/habitat',[
                'uses'=>'HabitatController@getIndex',
                'as'=>'habitat.index'
            ]);

            Route::get('/habitat/create',[
                'uses'=>'HabitatController@getCreate',
                'as'=>'habitat.getCreate'
            ]);

            Route::post('/habitat/create',[
                'uses'=>'HabitatController@postCreate',
                'as'=>'habitat.create'
            ]);

            Route::get('/habitat/retrieve',[
                'uses'=>'HabitatController@getRetrieve',
                'as'=>'habitat.retrieve'
            ]);

            Route::post('/habitat/update',[
                'uses'=>'HabitatController@postUpdate',
                'as'=>'habitat.update'
            ]);

            Route::get('/habitat/{id}/delete',[
                'uses'=>'HabitatController@getDelete',
                'as'=>'habitat.delete'
            ]);

           //Menu Leaf type
           Route::get('/leaf_type',[
                'uses'=>'LeafTypeController@getIndex',
                'as'=>'leaftype.index'
            ]);

            Route::get('/leaf_type/create',[
                'uses'=>'LeafTypeController@getCreate',
                'as'=>'leaftype.getCreate'
            ]);

            Route::post('/leaf_type/create',[
                'uses'=>'LeafTypeController@postCreate',
                'as'=>'leaftype.create'
            ]);

            Route::get('/leaf_type/retrieve',[
                'uses'=>'LeafTypeController@getRetrieve',
                'as'=>'leaftype.retrieve'
            ]);

            Route::post('/leaf_type/update',[
                'uses'=>'LeafTypeController@postUpdate',
                'as'=>'leaftype.update'
            ]);

            Route::get('/leaf_type/{id}/delete',[
                'uses'=>'LeafTypeController@getDelete',
                'as'=>'leaftype.delete'
            ]);

           //Menu Branch type
           Route::get('/branch_type',[
               'uses'=>'BranchTypeController@getIndex',
               'as'=>'branchtype.index'
           ]);

           Route::get('/branch_type/create',[
               'uses'=>'BranchTypeController@getCreate',
               'as'=>'branchtype.getCreate'
           ]);

           Route::post('/branch_type/create',[
               'uses'=>'BranchTypeController@postCreate',
               'as'=>'branchtype.create'
           ]);

           Route::get('/branch_type/retrieve',[
                'uses'=>'BranchTypeController@getRetrieve',
                'as'=>'branchtype.retrieve'
            ]);

           Route::post('/branch_type/update',[
               'uses'=>'BranchTypeController@postUpdate',
               'as'=>'branchtype.update'
           ]);

           Route::get('/branch_type/{id}/delete',[
               'uses'=>'BranchTypeController@getDelete',
               'as'=>'branchtype.delete'
           ]);

           //Menu Trunk type
           Route::get('/trunk_type',[
               'uses'=>'TrunkTypeController@getIndex',
               'as'=>'trunktype.index'
           ]);

           Route::get('/trunk_type/create',[
               'uses'=>'TrunkTypeController@getCreate',
               'as'=>'trunktype.getCreate'
           ]);

           Route::post('/trunk_type/create',[
               'uses'=>'TrunkTypeController@postCreate',
               'as'=>'trunktype.create'
           ]);

           Route::get('/trunk_type/retrieve',[
                'uses'=>'TrunkTypeController@getRetrieve',
                'as'=>'trunktype.retrieve'
            ]);

           Route::post('/trunk_type/update',[
              'uses'=>'TrunkTypeController@postUpdate',
              'as'=>'trunktype.update'
           ]);

           Route::get('/trunk_type/{id}/delete',[
              'uses'=>'TrunkTypeController@getDelete',
               'as'=>'trunktype.delete'
           ]);

           //Menu Root Type
           Route::get('/root_type',[
                'uses'=>'RootTypeController@getIndex',
                'as'=>'roottype.index'
           ]);

           Route::get('/root_type/create',[
                'uses'=>'RootTypeController@getCreate',
                'as'=>'roottype.getCreate'
           ]);

           Route::post('/root_type/create',[
                'uses'=>'RootTypeController@postCreate',
                'as'=>'roottype.create'
           ]);

           Route::get('/root_type/retrieve',[
                'uses'=>'RootTypeController@getRetrieve',
                'as'=>'roottype.retrieve'
            ]);

           Route::post('/root_type/update',[
               'uses'=>'RootTypeController@postUpdate',
               'as'=>'roottype.update'
           ]);

           Route::get('/root_type/{id}/delete',[
               'uses'=>'RootTypeController@getDelete',
               'as'=>'roottype.delete'
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

          // User-related section
          //========================
          //========================
          // Menu Pengaturan Pengguna
          //========================
          // Submenu Pendaftaran Pengguna
           Route::get('/pengguna/',[
              'uses'=>'UserManagementController@getUsermanIndex',
              'as'=>'usersmanagement.index'
           ]);

          // Submenu Peran pengguna
          Route::get('/peranpengguna/',[
            'uses'=>'UserManagementController@getRolesmanIndex',
            'as'=>'rolesmanagement.index'
          ]);

          // Submenu Perizinan Pengguna
          Route::get('/perizinanpengguna/',[
            'uses'=>'UserManagementController@getPermissionsmanIndex',
            'as'=>'permissionsmanagement.index'
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

// Auth::routes();

// Route::auth();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/treatment',[
//    'uses'=>'TreatmentController@getIndex',
//    'as'=>'treatment.index'
//]);
//Route::get('/home', 'HomeController@index')->name('home');
