<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoteObjectiveQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('note_objective_questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('note_id')->nullable();
            $table->longText('question',255);
            $table->longText('correct_answer')->nullable();
            $table->longText('option_1')->nullable();
            $table->longText('option_2')->nullable();
            $table->longText('option_3')->nullable();
            $table->longText('option_4')->nullable();
            $table->longText('option_5')->nullable();
            $table->longText('option_6')->nullable();
            $table->longText('option_7')->nullable();
            $table->longText('option_8')->nullable();
            $table->longText('option_9')->nullable();
            $table->longText('option_10')->nullable();
            $table->longText('explanation')->nullable();
            $table->string('marks')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->enum('status',['UNAPPROVED','APPROVED','DISAPPROVED'])->default('UNAPPROVED');
            $table->enum('difficulty_level',['EASY','MEDIUM','HARD']);
            $table->softDeletes();
            $table->timestamps();
            $table->index(['note_id']);
            $table->foreign('note_id')->references('id')->on('notes')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('admins');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('note_objective_questions');
    }
}
