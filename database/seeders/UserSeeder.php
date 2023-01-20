<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::create([
            'cedula'=>'1725159683',
            'name'=>'Aaron Patricio Ortiz Alban',
            'telefono'=>'0984588833',
            'email'=>'aronortiz90@yahoo.com',
            'password'=>bcrypt('12345678')

        ])->assignRole('Administrador');
    }
}
