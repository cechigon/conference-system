<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AttendancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            DB::table('attendances')->insert([
                'conferences_id' => $i,
                'users_id' => $i + 10,
                'father' => true,
                'mother' => false,
                'other' => false,
                'entry' => true,
                'entry_at' => Carbon::now(),
                'attendance' => true,
                'attendance_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            sleep(1);

            DB::table('attendances')->insert([
                'conferences_id' => $i,
                'users_id' => $i,
                'father' => true,
                'mother' => false,
                'other' => false,
                'entry' => true,
                'entry_at' => Carbon::now(),
                'attendance' => true,
                'attendance_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            sleep(1);
        }
    }
}
