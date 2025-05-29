<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Expense;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        $user = User::find(1); // Get the first user


        Category::factory(5)->create([
            'user_id' => $user,
        ]);

        $categoryId = $user->categories()->inRandomOrder()->first()->id; // Get a random category that belongs to the user

        Expense::factory(10)->create([
            'user_id' => $user,
            'category_id' => $categoryId,
        ]);
    }
}
