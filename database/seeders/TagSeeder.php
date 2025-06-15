<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::truncate();

        $data = [
            ['name' => 'Laravel'],
            ['name' => 'Php'],
            ['name' => 'Vue'],
            ['name' => 'Nuxt'],
            ['name' => 'Dart'],
            ['name' => 'Flutter'],
            ['name' => 'Nodejs'],
            ['name' => 'Nestjs'],
            ['name' => 'Swagger'],
            ['name' => 'Docker'],
            ['name' => 'AI'],
            ['name' => 'Travel'],
            ['name' => 'Homestay'],
            ['name' => 'Hotel'],
            ['name' => 'Restaurant'],
            ['name' => 'Food'],
            ['name' => 'Coffee'],
            ['name' => 'Tea'],
            ['name' => 'Wine'],
            ['name' => 'Beer'],
            ['name' => 'Cake'],
        ];

        foreach ($data as $item) {
            $tab = new Tag(array_merge($item, ['is_active' => true]));
            $tab->save();
        }
    }
}
