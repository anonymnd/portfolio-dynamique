<?php

namespace App\Models;
use App\Models\pages;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class language extends Model
{
    use HasFactory;
    protected $fillable = [
        'pages_id','language_name','level'
    ];
    public function page()
    {
        return $this->belongsTo(pages::class);
    }
}
