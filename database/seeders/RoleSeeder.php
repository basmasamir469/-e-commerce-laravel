<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('roles')->delete();
        DB::table('role_has_permissions')->delete();
        $roles=[
            'admin'=>'Admin',
            'owner'=>'Owner',
            'secretary'=>'Secretary',
            'user'=>'User'
        ];
        foreach($roles as $key=>$role){
            Role::create(['name'=>$roles[$key]]);
        }

         $admin=Role::where('name','Admin')->first();
         $allPermissions=Permission::all();
         $admin->syncPermissions($allPermissions);

        $owner=Role::where('name','Owner')->first();
        $ownerPermissions=Permission::whereIn('name',['product-list','product-edit','product-create','product-delete'])->get();
        $owner->syncPermissions($ownerPermissions);
        
        
        $secretary=Role::where('name','Secretary')->first();
        $secretaryPermissions=Permission::whereIn('name',['category-list','category-edit','category-create','category-delete'])->get();
        $secretary->syncPermissions($secretaryPermissions);





    }
}
