<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\pages;

class service extends Model
{
    use HasFactory;
    protected $fillable = [
        'pages_id', 'icon','title','description'
    ];
    public function page()
    {
        return $this->belongsTo(pages::class);
    }
}
