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
        return $this->belongsTo(User::class)->withDefault();

    }
    public function Company()
        {
        return $this->belongsTo(Company::class)->withDefault();
    }
}
