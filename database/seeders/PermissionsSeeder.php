<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create default permissions
        Permission::create(['name' => 'list accueilabouts']);
        Permission::create(['name' => 'view accueilabouts']);
        Permission::create(['name' => 'create accueilabouts']);
        Permission::create(['name' => 'update accueilabouts']);
        Permission::create(['name' => 'delete accueilabouts']);

        Permission::create(['name' => 'list accueilactus']);
        Permission::create(['name' => 'view accueilactus']);
        Permission::create(['name' => 'create accueilactus']);
        Permission::create(['name' => 'update accueilactus']);
        Permission::create(['name' => 'delete accueilactus']);

        Permission::create(['name' => 'list accueilclients']);
        Permission::create(['name' => 'view accueilclients']);
        Permission::create(['name' => 'create accueilclients']);
        Permission::create(['name' => 'update accueilclients']);
        Permission::create(['name' => 'delete accueilclients']);

        Permission::create(['name' => 'list accueilclientitems']);
        Permission::create(['name' => 'view accueilclientitems']);
        Permission::create(['name' => 'create accueilclientitems']);
        Permission::create(['name' => 'update accueilclientitems']);
        Permission::create(['name' => 'delete accueilclientitems']);

        Permission::create(['name' => 'list accueilformations']);
        Permission::create(['name' => 'view accueilformations']);
        Permission::create(['name' => 'create accueilformations']);
        Permission::create(['name' => 'update accueilformations']);
        Permission::create(['name' => 'delete accueilformations']);

        Permission::create(['name' => 'list accueilmanagers']);
        Permission::create(['name' => 'view accueilmanagers']);
        Permission::create(['name' => 'create accueilmanagers']);
        Permission::create(['name' => 'update accueilmanagers']);
        Permission::create(['name' => 'delete accueilmanagers']);

        Permission::create(['name' => 'list accueilmanageritems']);
        Permission::create(['name' => 'view accueilmanageritems']);
        Permission::create(['name' => 'create accueilmanageritems']);
        Permission::create(['name' => 'update accueilmanageritems']);
        Permission::create(['name' => 'delete accueilmanageritems']);

        Permission::create(['name' => 'list accueilservices']);
        Permission::create(['name' => 'view accueilservices']);
        Permission::create(['name' => 'create accueilservices']);
        Permission::create(['name' => 'update accueilservices']);
        Permission::create(['name' => 'delete accueilservices']);

        Permission::create(['name' => 'list accueilserviceitems']);
        Permission::create(['name' => 'view accueilserviceitems']);
        Permission::create(['name' => 'create accueilserviceitems']);
        Permission::create(['name' => 'update accueilserviceitems']);
        Permission::create(['name' => 'delete accueilserviceitems']);

        Permission::create(['name' => 'list accueiltemoins']);
        Permission::create(['name' => 'view accueiltemoins']);
        Permission::create(['name' => 'create accueiltemoins']);
        Permission::create(['name' => 'update accueiltemoins']);
        Permission::create(['name' => 'delete accueiltemoins']);

        Permission::create(['name' => 'list accueilvideos']);
        Permission::create(['name' => 'view accueilvideos']);
        Permission::create(['name' => 'create accueilvideos']);
        Permission::create(['name' => 'update accueilvideos']);
        Permission::create(['name' => 'delete accueilvideos']);

        Permission::create(['name' => 'list actualites']);
        Permission::create(['name' => 'view actualites']);
        Permission::create(['name' => 'create actualites']);
        Permission::create(['name' => 'update actualites']);
        Permission::create(['name' => 'delete actualites']);

        Permission::create(['name' => 'list equipes']);
        Permission::create(['name' => 'view equipes']);
        Permission::create(['name' => 'create equipes']);
        Permission::create(['name' => 'update equipes']);
        Permission::create(['name' => 'delete equipes']);

        Permission::create(['name' => 'list formations']);
        Permission::create(['name' => 'view formations']);
        Permission::create(['name' => 'create formations']);
        Permission::create(['name' => 'update formations']);
        Permission::create(['name' => 'delete formations']);

        Permission::create(['name' => 'list lienfooters']);
        Permission::create(['name' => 'view lienfooters']);
        Permission::create(['name' => 'create lienfooters']);
        Permission::create(['name' => 'update lienfooters']);
        Permission::create(['name' => 'delete lienfooters']);

        Permission::create(['name' => 'list partners']);
        Permission::create(['name' => 'view partners']);
        Permission::create(['name' => 'create partners']);
        Permission::create(['name' => 'update partners']);
        Permission::create(['name' => 'delete partners']);

        Permission::create(['name' => 'list settings']);
        Permission::create(['name' => 'view settings']);
        Permission::create(['name' => 'create settings']);
        Permission::create(['name' => 'update settings']);
        Permission::create(['name' => 'delete settings']);

        Permission::create(['name' => 'list slides']);
        Permission::create(['name' => 'view slides']);
        Permission::create(['name' => 'create slides']);
        Permission::create(['name' => 'update slides']);
        Permission::create(['name' => 'delete slides']);

        Permission::create(['name' => 'list typeformations']);
        Permission::create(['name' => 'view typeformations']);
        Permission::create(['name' => 'create typeformations']);
        Permission::create(['name' => 'update typeformations']);
        Permission::create(['name' => 'delete typeformations']);

        // Create user role and assign existing permissions
        $currentPermissions = Permission::all();
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo($currentPermissions);

        // Create admin exclusive permissions
        Permission::create(['name' => 'list roles']);
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'update roles']);
        Permission::create(['name' => 'delete roles']);

        Permission::create(['name' => 'list permissions']);
        Permission::create(['name' => 'view permissions']);
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'update permissions']);
        Permission::create(['name' => 'delete permissions']);

        Permission::create(['name' => 'list users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);

        // Create admin role and assign all permissions
        $allPermissions = Permission::all();
        $adminRole = Role::create(['name' => 'super-admin']);
        $adminRole->givePermissionTo($allPermissions);

        $user = \App\Models\User::whereEmail('admin@admin.com')->first();

        if ($user) {
            $user->assignRole($adminRole);
        }
    }
}
