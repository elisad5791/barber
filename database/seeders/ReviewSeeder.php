<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\Salon;
use App\Models\User;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Review::factory(10)->create();
    }
}
