<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function User()
    {
        return $this->belongsTo(User::class, 'supervisor_id')->withDefault();
    }
    public function Company()
    {
        return $this->belongsTo(Company::class)->withDefault();
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    //----------------- ManyToMany relationship ---------------------

    public function _students()
    {
        return $this->hasMany(Course_user::class, 'course_id', 'id');
    }

    public function students()
    {
        return $this->belongsToMany(User::class, Course_user::class, 'course_id', 'user_id');
    }

    //----------------------------------------------------------------
}
