<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvailableTime extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function expert()
    {
        return $this->belongsTo(Expert::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class,'time_id');
    }
    
    //----------------- ManyToMany relationship ---------------------
    // Check this method
    // public function payment()
    // {
    //     return $this->hasOne(Expert_payment::class,'payment_id');
    // }
    //----------------------------------------------------------------

}
