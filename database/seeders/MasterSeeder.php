<?php

namespace Database\Seeders;

use App\Models\Master;
use App\Models\User;
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
                $user = User::factory()->create([
                    'name' => 'master' . $i . $j,
                    'email'=> 'master' . $i . $j . '@mail.ru',
                ]);
                $user->assignRole('master');
                $master = Master::factory()->create(['salon_id' => $i, 'user_id' => $user->id]);
                $master->services()->sync(fake()->randomElements([1, 2, 3, 4, 5], 3));
            }
        }
    }
}
