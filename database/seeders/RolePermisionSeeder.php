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
        Permission::create(['name' => 'view products']);
        Permission::create(['name' => 'manage orders status']); // pour le seller
        Permission::create(['name' => 'view products reviews']);

        /**
         * permissions commandes (client)
         */
        Permission::create(['name' => 'place orders']);
        Permission::create(['name' => 'cancel orders']);
        
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
        Permission::create(['name' => 'manage roles']);
        Permission::create(['name' => 'suspend users']);
        Permission::create(['name' => 'view analytics']);


        Permission::create(['name' => 'create category']);
        Permission::create(['name' => 'edit category']);
        Permission::create(['name' => 'delete category']);
        Permission::create(['name' => 'view categories']);


        $superAdmin = Role::create(['name' => 'super-admin']);
        
        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo(Permission::all());

        $seller = Role::create(['name' => 'seller']);
        $seller->givePermissionTo([
            'create products',
            'edit products',
            'delete products',
            'view products',
            'manage orders status',
            'view products reviews'
        ]);

        $client = Role::create(['name' => 'client']);
        $client->givePermissionTo([
            'place orders',
            'cancel orders',
            'view own orders',
            'interact product',
        ]);

        $moderator = Role::create(['name' => 'moderator']);
        $moderator->givePermissionTo([
            'interact product',
            'delete reviews',
            'hide product',
            'suspend users',
        ]);
    }
}
