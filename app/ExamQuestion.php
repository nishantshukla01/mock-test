<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamQuestion extends Model
{
    function QuestionExams()
    {
        return $this->belongsTo(Exam::class, 'exam_id');
    }
    function Subjects()
    {
        return $this->belongsTo(SubjectCategory::class, 'subject_id');
    }
}
