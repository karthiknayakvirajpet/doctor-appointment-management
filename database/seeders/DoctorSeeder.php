<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Doctor;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Doctor::create([
            'id' => 1000,
            'name' => 'Dr. Jayanthi',
            'address' => 'No.145 Halasur, Bangalore',
            'active' => 1
        ]);

        Doctor::create([
            'id' => 1001,
            'name' => 'Dr. Ratnakar',
            'address' => 'No.27 Virajpet, Kodagu',
            'active' => 1
        ]);

        Doctor::create([
            'id' => 1002,
            'name' => 'Dr. Malashree',
            'address' => 'No.154 Madikeri, Kodagu',
            'active' => 1
        ]);
    }
}
