<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppliedEvaluation extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function evaluation()
    {
        return $this->belongsTo(Evaluation::class, 'evaluation_id')->withDefault();
    }
}
