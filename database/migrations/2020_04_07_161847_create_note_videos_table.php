<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoteVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('note_videos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('note_id')->nullable();
            $table->string('url')->nullable();
            $table->string('key');
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->bigInteger('counter')->default(0);
            $table->enum('type',['YOUTUBE','VIMEO'])->default('YOUTUBE');
            $table->enum('status',['UNAPPROVED','APPROVED','DISAPPROVED'])->default('UNAPPROVED');
            $table->softDeletes();
            $table->timestamps();
            $table->index(['note_id','title','status']);
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
        Schema::dropIfExists('note_videos');
    }
}
