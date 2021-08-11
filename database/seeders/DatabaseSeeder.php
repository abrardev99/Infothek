<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);

        Category::factory()->count(5)->create();
        Category::factory()->count(20)->create([
            'category_id' => rand(1,5),
        ]);

    }
}
