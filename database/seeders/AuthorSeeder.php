<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;
use Artisan;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call('passport:install');
        if (!Author::count()) {
            $authors = [
                ['username' => 'sam', 'password' => bcrypt('123')],
                ['username' => 'ali', 'password' => bcrypt('123')],
                ['username' => 'leyla', 'password' => bcrypt('123')],
            ];
            foreach ($authors as $author) {
                Author::create($author);
            }
        }
    }
}