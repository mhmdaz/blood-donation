<?php

namespace Database\Seeders;

use App\Models\State;
use App\Models\District;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $districts_list = [
            'Kerala' => [
                'Kozhikode',
                'Ernakulam',
                'Thiruvananthapuram',
            ],
        ];

        foreach($districts_list as $state => $districts) {
            $state = State::firstOrCreate([ 'name' => $state ]);

            foreach ($districts as $district) {
                District::firstOrCreate([
                    'name' => $district,
                    'state_id' => $state->id,
                ]);
            }
        }
    }
}
