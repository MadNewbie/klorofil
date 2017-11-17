<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $role = new Role();
        // $role->name = 'administrator';
        // $role->display_name = 'Administrator';
        // $role->description = 'Tingkatan user yang bisa mengakses semua fitur pada sistem';
        // $role->save();
        // foreach (Permission::get() as $permission=>$permission_value){
        //     $role->attachPermission($permission_value['id']);
        // }

        // $role = new Role();
        // $role->name= 'super-administrator';
        // $role->description = 'TBF';
        // $role->save();
        // foreach (Permission::get() as $permission=>$permission_value) {
        //     $role->attachPermission($permission_value['id']);
        // }

        $roles = [
            [
                'name' => 'administrator',
                'display_name' => 'Administrator',
                'description' => 'Tingkatan user yang bisa mengakses semua fitur pada sistem'
            ],
            [
                'name' => 'sa',
                'display_name' => 'Super Administrator',
                'description' => 'TBF'
            ]
        ];

        foreach ($roles as $key => $value) {
            # code...
            Role::create($value);
        }
    }
}
