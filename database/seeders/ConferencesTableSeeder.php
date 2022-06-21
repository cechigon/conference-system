<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ConferencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            DB::table('conferences')->insert([
                'conference_name' => "テスト $i",
                'class_number' => "$i" . "1",
                'deadline' => Carbon::now(),
                'start_time' => '09:00:00',
                'end_time' => '10:00:00',
                'location' => 'そこら辺',
                'note' => 'とくになし',
                'author' => $i,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
