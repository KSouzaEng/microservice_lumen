<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Book;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call('UsersTableSeeder');
        Book::factory()->count(50)->create();
    }
}
