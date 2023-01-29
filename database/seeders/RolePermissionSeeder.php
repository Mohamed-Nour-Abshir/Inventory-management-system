<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleSuperAdmin = Role::create(['name' => 'SuperAdmin']);
        $roleAdmin = Role::create(['name' => 'Admin']);
        $roleEditor = Role::create(['name' => 'Editor']);
        $roleUser = Role::create(['name' => 'User']);


        $permissions = [

            [
                'group_name' => 'Dashboard',
                'permissions' => ['Dashboard View']
            ],
            [
                'group_name' => 'Manage User',
                'permissions' => [
                    'Role Create',
                    'Role List',
                    'Role Edit',
                    'Role Delete',
                    'User List',
                    'User Create',
                    'User Edit',
                    'User Delete',
                ]
            ],
            [
                'group_name' => 'Manage Customer',
                'permissions' => [
                    'Customer List',
                    'Customer Create',
                    'Customer Edit',
                    'Customer Delete',
                ]
            ],
            [
                'group_name' => 'Manage Supplier',
                'permissions' => [
                    'Supplier List',
                    'Supplier Create',
                    'Supplier Edit',
                    'Supplier Delete',
                ]
            ],
            [
                'group_name' => 'Purchase',
                'permissions' => [
                    'Purchase List',
                    'Purchase Create',
                    'Purchase Edit',
                    'Purchase Delete',
                ]
            ],
            [
                'group_name' => 'Product',
                'permissions' => [
                    'Category List',
                    'Category Create',
                    'Category Edit',
                    'Category Delete',
                    'Brand List',
                    'Brand Create',
                    'Brand Edit',
                    'Brand Delete',
                    'Unit List',
                    'Unit Create',
                    'Unit Edit',
                    'Unit Delete',
                    'Warehouse List',
                    'Warehouse Create',
                    'Warehouse Edit',
                    'Warehouse Delete',
                    'Product List',
                    'Product Create',
                    'Product Edit',
                    'Product Delete',
                ]
            ],
            [
                'group_name' => 'Sale',
                'permissions' => [
                    'Order List',
                    'Order Create',
                    'Invoice Edit',
                    'Invoice Delete',
                ]
            ],
            [
                'group_name' => 'Return',
                'permissions' => [
                    'Purchase Return List',
                    'Purchase Return Create',
                    'Purchase Return Edit',
                    'Purchase Return Delete',
                    'Order Return List',
                    'Order Return Create',
                    'Order Return Edit',
                    'Order Return Delete',
                ]
            ],
            [
                'group_name' => 'Report',
                'permissions' => [
                    'Today Report',
                    'Inventory Report',
                    'Supplier Report',
                    'Sales Report',
                    'Purchase Report',
                    'Damage Product Report',
                ]
            ],
            [
                'group_name' => 'Expense',
                'permissions' => [
                    'Expense List',
                    'Expense Create',
                    'Expense Edit',
                    'Expense Delete',
                ]
            ],
            [
                'group_name' => 'Email',
                'permissions' => [
                    'Customer Email List',
                    'Customer Email Send',
                    'Customer Email Delete',
                    'Supplier Email List',
                    'Supplier Email Send',
                    'Supplier Email Delete',
                ]
            ],
            [
                'group_name' => 'Settings',
                'permissions' => [
                    'Company Settings Information',
                    'Company Settings Edit',
                    'Company Settings Delete',
                ]
            ],
            [
                'group_name' => 'General Account',
                'permissions' => [
                    'Account List',
                    'Account Create',
                    'Account Edit',
                    'Account Delete',
                    'Fundtransfer List',
                    'Fundtransfer Create',
                    'Fundtransfer Delete',
                ]
            ],

            [
                'group_name' => 'Challan',
                'permissions' => [
                    'Challan List',
                    'Challan Edit',
                    'Challan Delete',
                ]
            ],
        ];

        for ($i = 0; $i < count($permissions); $i++) {

            $permissionGroup = $permissions[$i]['group_name'];

            for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {

                $permission = Permission::create(['name' => $permissions[$i]['permissions'][$j], 'group_name' => $permissionGroup]);
                $roleSuperAdmin->givePermissionTo($permission);
                $permission->assignRole($roleSuperAdmin);
            }
        }
    }
}
