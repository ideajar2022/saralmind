<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoteCommentRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('note_comment_replies', function (Blueprint $table) {
            $table->id();
            $table->longText('reply');
            $table->unsignedBigInteger('comment_id')->nullable();
            $table->unsignedBigInteger('replied_by')->nullable();
            $table->SoftDeletes();
            $table->timestamps();
            $table->foreign('comment_id')->references('id')->on('note_comments')->onDelete('cascade');
            $table->foreign('replied_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('note_comment_replies');
    }
}
