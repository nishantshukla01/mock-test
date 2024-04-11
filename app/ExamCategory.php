<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExamCategory extends Model
{
    use SoftDeletes;
    protected $fillable = ['category','logo'];

    function Exams()
    {
        return $this->hasMany(Exam::class, 'category_id');
    }
}
