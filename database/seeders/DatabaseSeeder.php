<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        foreach (\App\Models\Template::catalog() as $id => $design) {
            $template = \App\Models\Template::firstOrCreate(['id' => $id], [
                'title' => $design['name'],
                'temp_image' => 'images/templates/'.$design['slug'].'.svg',
            ]);
            if (in_array($template->title, ['Agency', 'IPortfolio'])) {
                $template->update(['title' => $design['name'], 'temp_image' => 'images/templates/'.$design['slug'].'.svg']);
            }
        }
    }
}
