<?php

namespace Database\Seeders;

use App\Models\Pages;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class LocalDemoSeeder extends Seeder
{
    public function run(): void
    {
        if (!app()->environment('local')) {
            throw new \RuntimeException('Demo accounts are only available in the local environment.');
        }

        $this->call(DatabaseSeeder::class);
        DB::transaction(function () {
            if (User::where('email', 'demo@example.test')->exists()) return;
            $page = Pages::create(['templates_id' => 1]);
            Storage::disk('public')->put('images/demo-portrait.jpg', file_get_contents(public_path('assets/images/bg_1.jpg')));
            User::create([
                'name' => 'Portfolio Demo',
                'email' => 'demo@example.test',
                'password' => Hash::make('PortfolioDemo2026!'),
                'page_id' => $page->id,
            ]);
            DB::table('aboutmes')->insert([
                'pages_id' => $page->id,
                'full_name' => 'Portfolio Demo',
                'job' => 'Web Developer',
                'description' => 'Welcome to your portfolio builder. Replace this sample information with your own from the dashboard.',
                'birthday' => '1995-01-01',
                'city' => 'Casablanca',
                'image' => 'storage/images/demo-portrait.jpg',
            ]);
        });
    }
}
