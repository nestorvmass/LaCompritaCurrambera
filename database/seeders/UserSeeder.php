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
            'name'      =>  'Julio',
            'email'     =>  'stroman.georgianna@example.org',
            'password'  =>  bcrypt('12345678'),

        ]);

        
        // creacion de usuarios aleatorios
        // User::factory(1)->create();
    }
}
