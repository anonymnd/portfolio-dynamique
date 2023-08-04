<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\pages;

class project extends Model
{
    use HasFactory;
    protected $fillable = [
        'pages_id', 'title','sub_title','big_image','small_image','description','client','category'
    ];
    public function page()
    {
        return $this->belongsTo(pages::class);
    }
}
