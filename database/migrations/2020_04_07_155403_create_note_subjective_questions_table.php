<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoteSubjectiveQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('note_subjective_questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('note_id')->nullable();
            $table->longText('question',255);
            $table->longText('answer')->nullable();
            $table->string('marks')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->enum('type',['VERYSHORT','SHORT','LONG','VERYLONG']);
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
        Schema::dropIfExists('note_subjective_questions');
    }
}
