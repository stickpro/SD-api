<?php

namespace Database\Seeders;

use App\Models\Filter;
use App\Models\Portfolio;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Portfolio::create([
            'slug' => ['ru' => 'sunchro', 'en' => 'sunchro'],
            'filter_id' => Filter::first()->id,
            'title' => [ 'ru' => 'Заголовок', 'en' => 'title' ],
            'description' => ['ru' => 'Описание', 'en' => 'description'],
            'external_link' => 'https://synchro.ru/'
        ]);
    }
}
