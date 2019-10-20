<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\User;


class RolesAndPermissionsSeeder extends Seeder
{
   
    public function run()
{
    // Reset cached roles and permissions
    app()['cache']->forget('spatie.permission.cache');

    
    Role::create(['name' => 'user']);
   
  $a=  Role::create(['name' => 'admin']);


    $admin = User::create([
        'name'=>'lil',
        'gender'=>'0',
        'email'=>'lil@gmail.com',
        'password'=>bcrypt('123456')
    ]);
    $admin->assignRole($a);

    $adminn = User::create([
        'name'=>'bla',
        'gender'=>'0',
        'email'=>'bla@gmail.com',
        'password'=>bcrypt('123456')
    ]);
    $adminn->assignRole($a);
}
}
