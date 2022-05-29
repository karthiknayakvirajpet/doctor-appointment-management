<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TimeAvailability;

class TimeAvailabilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TimeAvailability::create([
            'id' => 1000,
            'doctor_id' => 1000,
            'day' => 1,
            'open_status' => 1,
            'start_time' => '05:00:00',
            'end_time' => '14:00:00'
        ]);

        TimeAvailability::create([
            'id' => 1001,
            'doctor_id' => 1000,
            'day' => 2,
            'open_status' => 1,
            'start_time' => '08:00:00',
            'end_time' => '18:00:00'
        ]);

        TimeAvailability::create([
            'id' => 1002,
            'doctor_id' => 1000,
            'day' => 3,
            'open_status' => 0,
            'start_time' => '00:00:00',
            'end_time' => '00:00:00'
        ]);

        TimeAvailability::create([
            'id' => 1003,
            'doctor_id' => 1000,
            'day' => 4,
            'open_status' => 0,
            'start_time' => '00:00:00',
            'end_time' => '00:00:00'
        ]);

        TimeAvailability::create([
            'id' => 1004,
            'doctor_id' => 1000,
            'day' => 5,
            'open_status' => 0,
            'start_time' => '00:00:00',
            'end_time' => '00:00:00'
        ]);

        TimeAvailability::create([
            'id' => 1005,
            'doctor_id' => 1000,
            'day' => 6,
            'open_status' => 0,
            'start_time' => '00:00:00',
            'end_time' => '00:00:00'
        ]);

        TimeAvailability::create([
            'id' => 1006,
            'doctor_id' => 1000,
            'day' => 7,
            'open_status' => 0,
            'start_time' => '00:00:00',
            'end_time' => '00:00:00'
        ]);

        TimeAvailability::create([
            'id' => 1007,
            'doctor_id' => 1001,
            'day' => 1,
            'open_status' => 0,
            'start_time' => '00:00:00',
            'end_time' => '00:00:00'
        ]);

        TimeAvailability::create([
            'id' => 1008,
            'doctor_id' => 1001,
            'day' => 2,
            'open_status' => 1,
            'start_time' => '12:00:00',
            'end_time' => '18:00:00'
        ]);

        TimeAvailability::create([
            'id' => 1009,
            'doctor_id' => 1001,
            'day' => 3,
            'open_status' => 0,
            'start_time' => '00:00:00',
            'end_time' => '00:00:00'
        ]);

        TimeAvailability::create([
            'id' => 1010,
            'doctor_id' => 1001,
            'day' => 4,
            'open_status' => 0,
            'start_time' => '00:00:00',
            'end_time' => '00:00:00'
        ]);

        TimeAvailability::create([
            'id' => 1011,
            'doctor_id' => 1001,
            'day' => 5,
            'open_status' => 0,
            'start_time' => '00:00:00',
            'end_time' => '00:00:00'
        ]);

        TimeAvailability::create([
            'id' => 1012,
            'doctor_id' => 1001,
            'day' => 6,
            'open_status' => 1,
            'start_time' => '14:00:00',
            'end_time' => '20:00:00'
        ]);

        TimeAvailability::create([
            'id' => 1013,
            'doctor_id' => 1001,
            'day' => 7,
            'open_status' => 0,
            'start_time' => '00:00:00',
            'end_time' => '00:00:00'
        ]);

        TimeAvailability::create([
            'id' => 1014,
            'doctor_id' => 1002,
            'day' => 1,
            'open_status' => 0,
            'start_time' => '00:00:00',
            'end_time' => '00:00:00'
        ]);

        TimeAvailability::create([
            'id' => 1015,
            'doctor_id' => 1002,
            'day' => 2,
            'open_status' => 0,
            'start_time' => '00:00:00',
            'end_time' => '00:00:00'
        ]);

        TimeAvailability::create([
            'id' => 1016,
            'doctor_id' => 1002,
            'day' => 3,
            'open_status' => 0,
            'start_time' => '00:00:00',
            'end_time' => '00:00:00'
        ]);

        TimeAvailability::create([
            'id' => 1017,
            'doctor_id' => 1002,
            'day' => 4,
            'open_status' => 1,
            'start_time' => '11:00:00',
            'end_time' => '21:00:00'
        ]);

        TimeAvailability::create([
            'id' => 1018,
            'doctor_id' => 1002,
            'day' => 5,
            'open_status' => 0,
            'start_time' => '00:00:00',
            'end_time' => '00:00:00'
        ]);

        TimeAvailability::create([
            'id' => 1019,
            'doctor_id' => 1002,
            'day' => 6,
            'open_status' => 1,
            'start_time' => '08:00:00',
            'end_time' => '15:00:00'
        ]);

        TimeAvailability::create([
            'id' => 1020,
            'doctor_id' => 1002,
            'day' => 7,
            'open_status' => 0,
            'start_time' => '00:00:00',
            'end_time' => '00:00:00'
        ]);
    }
}
