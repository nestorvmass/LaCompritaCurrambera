<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        // User::create([
        //     'name'      =>  'Nestor Villafañe',
        //     'email'     =>  'mass.nestor@gmail.com',
        //     'password'  =>  bcrypt('12345678'),

        // ])->assignRole('Admin');
        User::create([
            'name'      =>  'Nestor Villafañe - Admin',
            'email'     =>  'mass.nestor@gmail.com',
            'password'  =>  bcrypt('12345678'),

        ])->assignRole('Admin');
        
        User::create([
            'name'      =>  'Julian - Support',
            'email'     =>  'support@example.org',
            'password'  =>  bcrypt('12345678'),

        ])->assignRole('Support');

        User::create([
            'name'      =>  'Maria - Vendedor',
            'email'     =>  'vendedor1@example.org',
            'password'  =>  bcrypt('12345678'),

        ])->assignRole('Vendedor');

    

        
        // creacion de usuarios aleatorios
        // User::factory(1)->create();
    }
}
