<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Blogger']);

    // Permission::create(['name' => 'admin.home'])->assignRole($role1); //Asignamos 1 rol a 1 permiso
        Permission::create(['name' => 'admin.home','description'=>'Ver el Panel de Control'])->syncRoles([$role1, $role2]);

        //MODIFICAR USUARIOS
        Permission::create(['name' => 'admin.users.index','description'=>'Ver Listado de usuarios'])->assignRole($role1);
        Permission::create(['name' => 'admin.users.edit','description'=>'Asignar un rol'])->assignRole($role1);

        //ROLES PARA CATEGORIAS
        Permission::create(['name' => 'admin.categories.index','description'=>'Listado de categorias'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.categories.create','description'=>'Crear Categorias'])->assignRole($role1);
        Permission::create(['name' => 'admin.categories.edit','description'=>'Editar Categorias'])->assignRole($role1);
        Permission::create(['name' => 'admin.categories.destroy','description'=>'Eliminar Categorias'])->assignRole($role1);

        //ROLES PARA TAGS
        Permission::create(['name' => 'admin.tags.index','description'=>'Listado de Tags'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.tags.create','description'=>'Crear Tag'])->assignRole($role1);
        Permission::create(['name' => 'admin.tags.edit','description'=>'Editar Tag'])->assignRole($role1);
        Permission::create(['name' => 'admin.tags.destroy','description'=>'Eliminar Tag'])->assignRole($role1);

        //ROLES PARA POSTS
        Permission::create(['name' => 'admin.posts.index','description'=>'Listado de Posts'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.posts.create','description'=>'Crear Post'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.posts.edit','description'=>'Editar Post'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.posts.destroy','description'=>'Eliminar Post'])->syncRoles([$role1, $role2]);
    }
} 
  