<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamResultDetail extends Model
{
    protected $fillable = ['answer', 'result','visited','time_spent'];

    function ExamQuestionData()
    {
        return $this->belongsTo(ExamQuestion::class, 'question_id');
    }

    function ExamResultMast()
    {
        return $this->belongsTo(ExamResult::class, 'exam_result_id');
    }
}
