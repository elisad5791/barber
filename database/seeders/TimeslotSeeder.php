<?php

namespace Database\Seeders;

use App\Models\Timeslot;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class TimeslotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 16; $i++) {
            for ($j = 1; $j <= 5; $j++) {
                Timeslot::create([
                    'start' => Carbon::tomorrow()->add(9 + $j, 'hour'),
                    'finish' => Carbon::tomorrow()->add(10 + $j, 'hour'),
                    'master_id' => $i,
                ]);
            }
            for ($j = 1; $j <= 5; $j++) {
                Timeslot::create([
                    'start' => Carbon::tomorrow()->add(33 + $j, 'hour'),
                    'finish' => Carbon::tomorrow()->add(34 + $j, 'hour'),
                    'master_id' => $i,
                ]);
            }
        }
    }
}