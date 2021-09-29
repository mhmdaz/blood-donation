<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \App\Models\District::truncate();
        \App\Models\State::truncate();
        \App\Models\BloodGroup::truncate();
        \App\Models\User::truncate();
        \Spatie\Permission\Models\Role::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // \App\Models\User::factory(10)->create();

        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            BloodGroup::class,
            StateSeeder::class,
            DistrictSeeder::class,
        ]);
    }
}
