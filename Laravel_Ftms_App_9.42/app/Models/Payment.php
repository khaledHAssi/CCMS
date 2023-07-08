<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $guarded = [];

    // Check this method
    public function availableTime()
    {
        return $this->belongsTo(Expert_payment::class,'available_time_id')->withDefault();
    }

    //----------------- ManyToMany relationship ---------------------

    public function _experts()
    {
        return $this->hasMany(Expert_payment::class, 'payment_id', 'id');
    }

    public function experts()
    {
        return $this->belongsToMany(Expert::class, Expert_payment::class, 'payment_id', 'expert_id');
    }
    //----------------------------------------------------------------
}
