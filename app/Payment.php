<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Payment extends Model
{
    function PaymentExam()
    {
        return $this->belongsTo(Exam::class, 'exam_id');
    }

    function PaymentUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
