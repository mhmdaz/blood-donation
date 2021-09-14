<?php

namespace Database\Seeders;

use App\Models\BloodGroup;
use Illuminate\Database\Seeder;

class BloodGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blood_groups = [
            'A+',
            'B+',
            'AB+',
            'O+',
            'A-',
            'B-',
            'AB-',
            'O-',
        ];

        foreach ($blood_groups as $blood_group) {
            BloodGroup::firstOrCreate([
                'name' => $blood_group,
            ]);
        }
    }
}
