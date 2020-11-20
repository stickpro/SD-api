<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $models = [
                'user',
                'portfolios',
                'filter',
                'image'
        ];

        foreach ($models as $model) {
            Permission::create(['name' => "view-any-{$model}"]);
            Permission::create(['name' => "view-{$model}"]);
            Permission::create(['name' => "create-{$model}"]);
            Permission::create(['name' => "update-{$model}"]);
            Permission::create(['name' => "delete-{$model}"]);
            Permission::create(['name' => "restore-{$model}"]);
        }

        $role = Role::findByName('admin');

        foreach ($models as $model) {
            $role->givePermissionTo("view-any-{$model}");
            $role->givePermissionTo("view-{$model}");
            $role->givePermissionTo("create-{$model}");
            $role->givePermissionTo("update-{$model}");
            $role->givePermissionTo("delete-{$model}");
            $role->givePermissionTo("restore-{$model}");
        }
    }
}
