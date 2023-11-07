<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaFeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_feeds', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('media');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('url')->nullable();
            $table->enum('status', ['UNAPPROVED','APPROVED','DISAPPROVED'])->default('UNAPPROVED');
            $table->integer('order')->default(0);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->date('published_at')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('media_feeds');
    }
}
