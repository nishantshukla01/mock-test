<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubjectCategory extends Model
{
    use SoftDeletes;
    protected $fillable = ['subject_category'];
    function Subjects()
    {
        return $this->hasMany(ExamQuestion::class, 'subject_id');
    }

}
