<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $users = [
            [
                'first_name' => "Batanayi",
                'last_name' => "Matuku",
                'email' => "bdizha@gmail.com",
                'type' => "local",
                'password' => bcrypt("bizha@gmail.com")
            ],
            [
                'first_name' => "Bill",
                'last_name' => "Gates",
                'email' => "bill@gmail.com",
                'type' => "local",
                'password' => bcrypt("bill@gmail.com")
            ],
            [
                'first_name' => "Trevor",
                'last_name' => "Noah",
                'email' => "trevor@gmail.com",
                'type' => "guest",
                'password' => bcrypt("trevor@gmail.com")
            ]
        ];

        foreach ($users as $user) {
            User::create(
                    $user
            );
        }
    }

}
