<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('exam_id');
            $table->integer('subject_id');
            $table->longText('question');
            $table->text('opt_1');
            $table->text('opt_2');
            $table->text('opt_3');
            $table->text('opt_4');
            $table->text('answer');
            $table->time('duration');
            $table->float('mark',10,2)->default(1);
            $table->float('minus',10,2)->default(0);
            $table->integer('question_sequence')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam_questions');
    }
}
