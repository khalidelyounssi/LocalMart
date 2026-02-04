<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        /**
         * Produits(seller & admin)
         */
        Permission::create(['name' => 'create products']);
        Permission::create(['name' => 'edit products']);
        Permission::create(['name' => 'delete products']);
        Permission::create(['name' => 'browse catalogue']);
        Permission::create(['name' => 'manage orders status']); // pour le seller

        /**
         * permissions commandes (client)
         */
        Permission::create(['name' => 'place orders']);
        Permission::create(['name' => 'cancel orders']);
        Permission::create(['name' => 'view product']);
        Permission::create(['name' => 'view all orders']);
        Permission::create(['name' => 'view own orders']);

        /**
         * permissions commandes (client & moderator)
         */
        Permission::create(['name' => 'interact product']); // pour like & review
        Permission::create(['name' => 'delete reviews']); // pour le moderator
        Permission::create(['name' => 'hide product']); // pour le moderator

        /**
         * permissions administrateur
         */
        Permission::create(['name' => 'manage users']);
        Permission::create(['name' => 'manage roles']);
        Permission::create(['name' => 'suspend users']);
        Permission::create(['name' => 'view analytics']);

        $superAdmin = Role::create(['name' => 'super-admin']);
        
        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo(Permission::all());

        $seller = Role::create(['name' => 'seller']);
        $seller->givePermissionTo([
            'create products',
            'edit products',
            'delete products',
            'browse catalogue',
            'manage orders status',
            'view own orders',
        ]);

        $client = Role::create(['name' => 'client']);
        $client->givePermissionTo([
            'browse catalogue',
            'place orders',
            'cancel orders',
            'view own orders',
            'interact product',
        ]);

        $moderator = Role::create(['name' => 'moderator']);
        $moderator->givePermissionTo([
            'browse catalogue',
            'interact product',
            'delete reviews',
            'hide product',
            'suspend users',
        ]);
    }
}
