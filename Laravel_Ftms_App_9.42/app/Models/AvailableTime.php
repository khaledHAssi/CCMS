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
        return $this->belongsTo(Expert::class)->withDefault();
    }

    // Check this method
    public function payment()
    {
        return $this->hasOne(Expert_payment::class,'payment_id');
    }
}
