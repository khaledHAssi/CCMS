<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expert extends Model
{
    use HasFactory;
    protected  $guarded = [];
    public function availableTime()
    {
        return $this->hasMany(AvailableTime::class,'expert_id');
    }
    public function User()
    {
        return $this->belongsTo(User::class, 'doctor_id')->withDefault();
    }
    public function company()
    {
        return $this->belongsTo(Company::class)->withDefault();
    }

    //----------------- ManyToMany relationship ---------------------

    // public function _payments()
    // {
    //     return $this->hasMany(Expert_payment::class, 'expert_id', 'id');
    // }

    // public function payments()
    // {
    //     return $this->belongsToMany(Payment::class, Expert_payment::class, 'expert_id', 'payment_id');
    // }

    //----------------------------------------------------------------
}
