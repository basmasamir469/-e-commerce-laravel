<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('permissions')->delete();
        $permissions=[
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'product-list',
            'product-create',
            'product-edit',
            'product-delete',
            'category-list',
            'category-create',
            'category-edit',
            'category-delete',
    ];
    $routes=[
        'users.index',
        'users.create,users.store',
        'users.edit,users.update',
        'users.destroy',
        'roles.index',
        'roles.create,roles.store',
        'roles.edit,roles.update',
        'roles.destroy',
        'products.index',
        'products.create,products.store',
        'products.edit,products.update',
        'products.destroy',
        'Categories.index',
        'Categories.create,Categories.store',
        'Categories.edit,Categories.update',
        'Categories.destroy'
    ];
    foreach($permissions as $key => $permission){
        Permission::create(['name'=>$permissions[$key],'routes'=>$routes[$key]]);
    }
    }
}
