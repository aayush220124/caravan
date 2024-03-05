<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CaravansSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        $data = [];

        for ($i = 0; $i < 5; $i++) {
            $data[] = [
                'admin_id' => 1,
                'caravan_name' => $faker->company,
                'make' => $faker->word,
                'model' => $faker->word,
                'year' => $faker->numberBetween(2000, 2022),
                'registration_number' => $faker->regexify('[A-Z]{3}[0-9]{3}'),
                'color' => $faker->safeColorName,
                'mileage' => $faker->numberBetween(1000, 100000),
                'images_url' => $faker->imageUrl(),
                'video_url' => $faker->url,
                'short_description' => $faker->sentence,
                'long_description' => $faker->paragraph,
                'tags' => implode(', ', $faker->words(3)),
                'features' => implode(', ', $faker->words(3)),
                'amenities' => implode(', ', $faker->words(3)),
                'rules_regulations' => $faker->paragraph,
                'minimum_days_available' => $faker->numberBetween(1, 10),
                'dates_availability' => $faker->numberBetween(1, 30),
                'deposit_price' => $faker->numberBetween(100, 1000),
                'per_day_price' => $faker->numberBetween(50, 200),
            ];
        }

        $this->db->table('caravans')->insertBatch($data);
    }
}
