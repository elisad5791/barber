<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'make reservation']);
        Permission::create(['name' => 'see dashboard']);
        Permission::create(['name' => 'edit dashboard']);

        $role1 = Role::create(['name' => 'admin']);

        $role2 = Role::create(['name' => 'owner']);
        $role2->givePermissionTo('make reservation');
        $role2->givePermissionTo('see dashboard');
        $role2->givePermissionTo('edit dashboard');

        $role3 = Role::create(['name' => 'master']);
        $role3->givePermissionTo('make reservation');
        $role3->givePermissionTo('see dashboard');

        $role4 = Role::create(['name' => 'client']);
        $role4->givePermissionTo('make reservation');

        $user = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@mail.ru',
        ]);
        $user->assignRole($role1);

    }
}
