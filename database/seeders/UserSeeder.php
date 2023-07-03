<?php

namespace Database\Seeders;

use App\Models\Section;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
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
        //Permisions
        $bedroom = Permission::create(['name'=>'bedroom']);
        $floor = Permission::create(['name'=>'floor']);
        $section = Permission::create(['name'=>'section']);
        $room = Permission::create(['name'=>'room']);
        $user = Permission::create(['name'=>'user']);
        $booking = Permission::create(['name'=>'booking']);

        //Roles
        $admin_role = Role::create(['name'=>'admin']);
        $admin_role->givePermissionTo([
            $bedroom,
            $floor,
            $section,
            $room,
            $booking
        ]);

        $super_admin_role = Role::create(['name'=>'super_admin']);

        $super_admin_role->givePermissionTo([
            $bedroom,
            $floor,
            $section,
            $room,
            $booking,
            $user
        ]);

        $super_admin =  User::create([
            'name'=>'Aybek',
            'lastname'=>'Jumabekov',
            'birthday'=>'2002-10-23',
            'phone'=>'+998991042266',
            'password'=>Hash::make('12345678')
        ]);

        $super_admin->assignRole($super_admin_role);
        $super_admin->givePermissionTo([
            $bedroom,
            $floor,
            $section,
            $room,
            $booking,
            $user
        ]);

    }
}
