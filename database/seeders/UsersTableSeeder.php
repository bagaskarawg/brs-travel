<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'email' => 'me@bagaskarawg.id',
                'name' => 'Bagaskara Wisnu Gunawan',
                'phone_number' => '087781805651',
                'is_admin' => true,
            ],
            [
                'email' => 'rubby@bagaskarawg.id',
                'name' => 'Rubby',
                'phone_number' => '083112744122',
                'is_admin' => false,
            ],
            [
                'email' => 'syarif@bagaskarawg.id',
                'name' => 'Syarif',
                'phone_number' => '081912107000',
                'is_admin' => false,
            ],
        ];

        foreach ($users as $user) {
            User::create([
                ...$user,
                'password' => bcrypt($user['is_admin'] ? 'admin123' : 'user1234'),
            ]);
        }
    }
}
