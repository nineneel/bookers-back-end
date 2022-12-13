<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Author;
use App\Models\Book;
use App\Models\BookAuthor;
use App\Models\BookCopy;
use App\Models\BookGenre;
use App\Models\Checkout;
use App\Models\Genre;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use App\Models\UserRole;
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
        User::create([
            'name' => 'admin',
            'email' => 'admin@email.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);

        Role::create([
            'name' => 'admin'
        ]);

        Role::create([
            'name' => 'user'
        ]);

        UserRole::create([
            'user_id' => 1,
            'role_id' => 1
        ]);

        // User::factory(10)->create();

        // $authors = Author::factory(25)->create();

        // $genres = Genre::factory(10)->create();

        // Book::factory(100)->create()->each(function ($author) {
        //     $randomFields = Author::all()->random(rand(1, 2))->pluck('id');
        //     $author->authors()->attach($randomFields);
        // })->each(function ($genres) {
        //     $randomFields = Genre::all()->random(rand(1, 3))->pluck('id');
        //     $genres->genres()->attach($randomFields);
        // });

        // BookCopy::factory(500)->create();

        // Checkout::factory(20)->create();
    }
}
