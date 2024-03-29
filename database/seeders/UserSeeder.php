<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (config('seeding.users') as $role => $users) {
            foreach($users as $user_details) {
                $user = User::create(array_merge($user_details, [
                    'email_verified_at' => now(),
                    'password' => bcrypt('admin123'),
                    'remember_token' => Str::random(10),
                ]));

                $user->assignRole($role);
            }
        }
    }
}
