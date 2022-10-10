<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo "Creating temp testing users.\n";
        User::factory()
            ->create([
                'name'      => 'user',
                'surname'   => 'userSurname',
                'login'     => 'userSurnameuse',
                'password'  => Hash::make('useruser'),
                'role'      => 1
            ]);
    
        User::factory()
            ->create([
                'name'      => 'moder',
                'surname'   => 'moderSurname',
                'login'     => 'moderSurnamemod',
                'password'  => Hash::make('modermoder'),
                'role'      => 2
            ]);
        
        echo "Ok.\n";
    
        User::factory()
            ->create([
                'name'      => 'admin',
                'surname'   => 'adminSurname',
                'login'     => 'adminSurnameadm',
                'password'  => Hash::make('adminadmin'),
                'role'      => 3
            ]);
    }
}
