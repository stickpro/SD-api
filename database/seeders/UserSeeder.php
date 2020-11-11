<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::unsetEventDispatcher();

        $user = User::factory()
                ->create();

        $user->assignRole(Role::findByName('admin'));
    }
}
