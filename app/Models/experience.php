<?php

namespace App\Models;
use App\Models\pages;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class experience extends Model
{
    use HasFactory;
    protected $fillable = [
        'pages_id','date','title','place','description'
    ];
    public function page()
    {
        return $this->belongsTo(pages::class);
    }
}
