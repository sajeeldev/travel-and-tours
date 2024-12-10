<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdmin = Role::create(['name' => 'Super Admin']);
        $admin = Role::create(['name' => 'Admin']);
        $customer = Role::create(['name' => 'Customer']);
        $accManager = Role::create(['name' => 'Account Manager']);
        $reviewer = Role::create(['name' => 'Reviewer']);
        $bookingManager = Role::create(['name' => 'Booking Manager']);
        $graphicDesigner = Role::create(['name' => 'Graphic Designer']);
        $developer = Role::create(['name' => 'Developer']);
        $seo = Role::create(['name' => 'Seo']);
        $marketing = Role::create(['name' => 'Marketing']);

        User::create([
            'firstname' => 'sajeel',
            'lastname' => 'rehman',
            'email' => 'sajeel@gmail.com',
            'password' => Hash::make('sajeel1234'),
        ])->assignRole($superAdmin);

        User::create([
            'firstname' => 'hassan',
            'lastname' => 'iqbal',
            'email' => 'hassan@gmail.com',
            'password' => Hash::make('hassan1234'),
        ])->assignRole($admin);

        User::create([
            'firstname' => 'mohsin',
            'lastname' => 'raza',
            'email' => 'mohsin@gmail.com',
            'password' => Hash::make('mohsin1234'),
        ])->assignRole($customer);

        User::create([
            'firstname' => 'Usama',
            'lastname' => 'mughal',
            'email' => 'Usama@gmail.com',
            'password' => Hash::make('usama1234'),
        ])->assignRole($accManager);

        User::create([
            'firstname' => 'zarwan',
            'lastname' => 'haider',
            'email' => 'zarwan@gmail.com',
            'password' => Hash::make('zarwan1234'),
        ])->assignRole($reviewer);

        User::create([
            'firstname' => 'jimmy',
            'lastname' => 'jame',
            'email' => 'jimmy@gmail.com',
            'password' => Hash::make('jimmy1234'),
        ])->assginRole($bookingManager);

        User::create([
            'firstname' => 'monam',
            'lastname' => 'shah',
            'email' => 'monam@gmail.com',
            'password' => Hash::make('monam1234'),
        ])->assignRole($graphicDesigner);

        User::create([
            'firstname' => 'waneed',
            'lastname' => 'ali',
            'email' => 'waneed@gmail.com',
            'password' => Hash::make('waneed1234'),
        ])->assginRole($developer);

        User::create([
            'firstname' => 'joseph',
            'lastname' => 'jack',
            'email' => 'joseph@gmail.com',
            'password' => Hash::make('joesph1234'),
        ])->assignRole($seo);

        User::create([
            'firstname' => 'peter',
            'lastname' => 'jackson',
            'email' => 'peter@gmail.com',
            'password' => Hash::make('peter1234'),
        ])->assignRole($marketing);

    }
}
