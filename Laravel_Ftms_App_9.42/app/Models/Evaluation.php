<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    //----------------- ManyToMany relationship ---------------------
    public function _evaluation_companies()
    {
        return $this->hasMany(Company_evaluations::class, 'evaluation_id', 'id');
    }

    public function evaluation_companies()
    {
        return $this->belongsToMany(Company::class, Company_evaluations::class, 'evaluation_id', 'company_id');
    }
    //----------------------------------------------------------------

}
