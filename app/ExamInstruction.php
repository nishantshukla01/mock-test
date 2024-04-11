<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamInstruction extends Model
{
    function ExamMaster(){
        return $this->belongsTo(Exam::class,'exam_id');
    }
}
