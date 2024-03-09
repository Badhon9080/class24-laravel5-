<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//use Database\Seeders\CategorySeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $testData = new Category();
       $testData->category = 'mobile';
       $testData->category_slug = 'mobile';
       $testData->save();
    };
}
