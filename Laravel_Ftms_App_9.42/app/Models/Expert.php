<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expert extends Model
{
    use HasFactory;
    protected  $guarded = [] ;
    public function AvailableTime()
    {
        return $this->hasMany(AvailableTime::class);
    }
    public function User()
    {
        return $this->belongsTo(User::class, 'doctor_id')->withDefault();
    }
    public function company()
    {
        return $this->belongsTo(Company::class)->withDefault();
    }
}
