<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'username',
        'type',
        'created_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
    public function Experts()
    {
        return $this->hasMany(Expert::class , 'doctor_id');
    }


    public function applications()
    {
        return $this->hasMany(Application::class);
    }
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
    public function evaluationAnswers()
    {
        return $this->hasMany(EvaluationAnswer::class);
    }
    //----------------- ManyToMany relationship ---------------------

    public function _student_courses(){
        return $this->hasMany(Course_student::class,'user_id','id');
    }
    public function reports(){
        return $this->hasMany(Report::class,'user_id','id');
    }
    public function student_courses(){
        return $this->belongsToMany(Course::class,Course_student::class, 'user_id','course_id');
    }

    //----------------------------------------------------------------

}
