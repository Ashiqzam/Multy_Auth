<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name'=>'Admin',
                'email'=>'admin@itsolutionstuff.com',
                'phone' =>'01831763868',
                'is_admin'=>'1',
                'status'=>'1',
                'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'User',
                'email'=>'user@itsolutionstuff.com',
                'phone' =>'01831763868',
                'is_admin'=>'0',
                'status'=>'1',
                'password'=> bcrypt('123456'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
