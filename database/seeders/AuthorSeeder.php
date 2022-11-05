<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Author::count()) {
            $authors = [
                ['name' => 'sam'],
                ['name' => 'ali'],
                ['name' => 'leyla'],
            ];
            foreach ($authors as $author) {
                Author::create($author);
            }
        }
    }
}