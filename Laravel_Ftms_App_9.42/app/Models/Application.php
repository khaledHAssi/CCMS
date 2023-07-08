<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function company()
    {
        return $this->belongsTo(Company::class)->withDefault();
    }
    
    public function course()
    {
        return $this->belongsTo(Course::class)->withDefault();
    }
}
