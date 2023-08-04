<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\pages;

class Template extends Model
{
    public static function catalog(): array
    {
        return [
            1 => ['name' => 'Forma', 'slug' => 'forma', 'tagline' => 'Quiet confidence. Beautiful clarity.', 'category' => 'Minimal', 'color' => '#526347'],
            2 => ['name' => 'Noir', 'slug' => 'noir', 'tagline' => 'Bold work deserves a bold canvas.', 'category' => 'Dark', 'color' => '#b9ed75'],
            3 => ['name' => 'Editorial', 'slug' => 'editorial', 'tagline' => 'A story worth spending time with.', 'category' => 'Elegant', 'color' => '#af4a2b'],
            4 => ['name' => 'Studio', 'slug' => 'studio', 'tagline' => 'A little personality goes a long way.', 'category' => 'Creative', 'color' => '#634ac7'],
            5 => ['name' => 'Terminal', 'slug' => 'terminal', 'tagline' => 'Built for people who build things.', 'category' => 'Developer', 'color' => '#54ddb7'],
        ];
    }

    protected $fillable = [
        'title','temp_image'
    ];
    public function page()
    {
        return $this->hasMany(pages::class);
    }
}
