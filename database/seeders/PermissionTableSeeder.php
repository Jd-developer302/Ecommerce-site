<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Permissions
        $permissions = [
            'product-list',
            'product-create',
            'product-edit',
            'product-delete',
            'order-list',
            'order-create',
            'order-edit',
            'order-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'attribute-list',
            'attribute-create',
            'attribute-edit',
            'attribute-delete',
            'order-status',
            'drivers-order',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'crm-orders',
            'report-list',
            'invoiced-orders',
            'packed-orders'
        ];
       
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}