<?php

namespace Database\Seeders;

use App\Enums\RolesEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $admin = Role::create(['name' => RolesEnum::ADMIN]);
        $manager = Role::create(['name' => RolesEnum::MANAGER]);
        $guest = Role::create(['name' => RolesEnum::GUEST]);
        $customer = Role::create(['name' => RolesEnum::CUSTOMER]);


        //  Permissions

        $crpr = Permission::create(['name' => 'create product']);
        $edpr = Permission::create(['name' => 'edit product']);
        $dlpr = Permission::create(['name' => 'delete product']);
        $vipr = Permission::create(['name' => 'view product']);
        $alpr = Permission::create(['name' => 'all product']);

        $admin->syncPermissions($crpr, $edpr, $dlpr, $vipr, $alpr);
        $manager->syncPermissions($crpr, $edpr, $dlpr, $vipr, $alpr);
        $guest->syncPermissions($alpr);
        $customer->syncPermissions($crpr, $edpr, $dlpr, $vipr, $alpr);

    }
}
