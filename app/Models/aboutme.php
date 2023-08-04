<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\pages;

class aboutme extends Model
{
    use HasFactory;
    protected $fillable = [
        'page_id','image','full_name','job','description',
        'birthday','city'
    ];

    public function page()
    {
        return $this->belongsTo(pages::class);
    }
}
