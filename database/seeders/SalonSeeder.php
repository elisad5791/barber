<?php

namespace Database\Seeders;

use App\Models\Salon;
use App\Models\User;
use Illuminate\Database\Seeder;

class SalonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = User::factory()->create([
            'name' => 'owner1',
            'email' => 'owner1@mail.ru'
        ]);
        $user1->assignRole('owner');
        $salon1 = Salon::create([
            'user_id' => $user1->id,
            'title' => 'Фея',
            'description' => 'Салон с большим спектром услуг для взрослых и детей',
        ]);
        $salon1->services()->sync([1, 2, 3, 4, 5]);

        $user2 = User::factory()->create([
            'name' => 'owner2',
            'email' => 'owner2@mail.ru'
        ]);
        $user2->assignRole('owner');
        $salon2 = Salon::create([
            'user_id' => $user2->id,
            'title' => 'Золушка',
            'description' => 'Салон с большим спектром услуг для взрослых и детей',
        ]);
        $salon2->services()->sync([1, 2, 3, 4, 5]);

        $user3 = User::factory()->create([
            'name' => 'owner3',
            'email' => 'owner3@mail.ru'
        ]);
        $user3->assignRole('owner');
        $salon3 = Salon::create([
            'user_id' => $user3->id,
            'title' => 'Кудесница',
            'description' => 'Салон с большим спектром услуг для взрослых и детей',
        ]);
        $salon3->services()->sync([1, 2, 3, 4, 5]);

        $user4 = User::factory()->create([
            'name' => 'owner4',
            'email' => 'owner4@mail.ru'
        ]);
        $user4->assignRole('owner');
        $salon4 = Salon::create([
            'user_id' => $user4->id,
            'title' => 'Мелифисента',
            'description' => 'Салон с большим спектром услуг для взрослых и детей',
        ]);
        $salon4->services()->sync([1, 2, 3, 4, 5]);
    }
}
