<?php
namespace App\Models;
use App\Models\Aboutme;
use App\Models\Contact;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Language;
use App\Models\Hobbie;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Service;
use App\Models\Template;
use App\Models\User;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pages extends Model
{
    use HasFactory;

    protected $fillable = [
        'templates_id',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
public function template()
{
    return $this->belongsTo(Template::class);
}
public function hobbie()
{
    return $this->hasMany(Hobbie::class);
}
public function language()
{
    return $this->hasMany(language::class);
}
public function aboutme()
{
    return $this->hasMany(Aboutme::class);
}
public function education()
{
    return $this->hasMany(Education::class);
}
public function contact()
{
    return $this->hasMany(Contact::class);
}
public function skill()
{
    return $this->hasMany(Skill::class);
}
public function experience()
{
    return $this->hasMany(Experience::class);
}
public function portfolio()
{
    return $this->hasMany(Project::class);
}
public function service()
{
    return $this->hasMany(Service::class);
}



}
