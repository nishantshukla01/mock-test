<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ExamResult extends Model
{
    protected $fillable = ['total_time', 'total_attempt', 'current_question','status','is_active'];

    function ExamData()
    {
        return $this->belongsTo(Exam::class, 'exam_id');
    }

    function ExamResults()
    {
        return $this->hasMany(ExamResultDetail::class,'exam_result_id');
    }
}
