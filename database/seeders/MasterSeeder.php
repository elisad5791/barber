<?php

namespace Database\Seeders;

use App\Models\Master;
use Illuminate\Database\Seeder;

class MasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 4; $i++) {
            for ($j = 1; $j <= 4; $j++) {
                $master = Master::factory()->create(['salon_id' => $i]);
                $master->services()->sync(fake()->randomElements([1, 2, 3, 4, 5], 3));
            }
        }
    }
}
