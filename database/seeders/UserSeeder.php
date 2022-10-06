<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insertOrIgnore([
            [
                'name'          => 'user',
                'surname'       => 'userSurname',
                'nickname'      => 'userNickname',
                'phone'         => '+111111111',
                'email'         => 'user@user.com',
                'address'       => 'User street',
                'city'          => 'User city',
                'state'         => 'User state',
                'zip'           => '15333',
                'login'         => 'userSurnameuse',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'password'      => Hash::make('useruser'),
                'role'          => 1
            ],
            [
                'name'          => 'moder',
                'surname'       => 'moderSurname',
                'nickname'      => 'moderNickname',
                'phone'         => '+111111111',
                'email'         => 'moder@moder.com',
                'address'       => 'moder street',
                'city'          => 'moder city',
                'state'         => 'moder state',
                'zip'           => '15333',
                'login'         => 'moderSurnamemod',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'password'      => Hash::make('modermoder'),
                'role'          => 2
            ],
            [
                'name'          => 'admin',
                'surname'       => 'adminSurname',
                'nickname'      => 'adminNickname',
                'phone'         => '+111111111',
                'email'         => 'admin@admin.com',
                'address'       => 'admin street',
                'city'          => 'admin city',
                'state'         => 'admin state',
                'zip'           => '15333',
                'login'         => 'adminSurnameadm',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'password'      => Hash::make('adminadmin'),
                'role'          => 3
            ],
        ]);
    }
}
