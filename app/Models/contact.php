<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\pages;

class contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'pages_id','icon','name','lien'
    ];
    public function page()
    {
        return $this->belongsTo(pages::class);
    }
}
