<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = ['category_id', 'exam_name', 'total_mark', 'total_question', 'total_time', 'exam_cost', 'slug'];

    public function setExamNameAttribute($value)
    {
        return $this->attributes['exam_name'] = ucwords($value);
    }

    function Categories()
    {
        return $this->belongsTo(ExamCategory::class, 'category_id');
    }

    function ExamDetails()
    {
        return $this->hasMany(ExamQuestion::class, 'exam_id');
    }

    function Payments()
    {
        return $this->hasMany(Payment::class, 'exam_id');
    }
    function ExamResultData(){
        return $this->hasMany(ExamResult::class, 'exam_id');
    }
    function ExamInstructionData(){
        return $this->hasOne(ExamInstruction::class, 'exam_id');
    }
}
