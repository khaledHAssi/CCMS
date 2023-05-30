<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes ;

    // protected $fillable = ['name', 'image', 'description', 'location']; // الي مسموح يتخزن على قاعدة البايانات
    protected $guarded = []; // الي ممنوع يتخزن على قاعدة البايانات

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
    public function experts()
    {
        return $this->hasMany(Expert::class);
    }
    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }

}
