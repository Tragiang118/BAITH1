<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Thêm dòng này
use Faker\Factory as Faker;
use App\Models\Issue;
use App\Models\Computer;

class ComputersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 50; $i++) {
            DB::table('computers')->insert([
                'computer_name' => $faker->word . '-' . $faker->randomNumber(3),
                'model' => $faker->word . ' ' . $faker->randomNumber(3),
                'operating_system' => $faker->randomElement(['Windows 10 Pro', 'Windows 11', 'Linux Ubuntu']),
                'processor' => $faker->randomElement(['Intel Core i5', 'Intel Core i7', 'AMD Ryzen 5', 'AMD Ryzen 7']),
                'memory' => $faker->numberBetween(4, 64),
                'available' => $faker->boolean,
                'created_at' => now(),
                'updated_at' => now(), 
            ]);
        }
    }
}
