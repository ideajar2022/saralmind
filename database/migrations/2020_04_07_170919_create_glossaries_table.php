<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlossariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('glossaries', function (Blueprint $table) {
            $table->id();
            $table->string('word')->unique();
            $table->longText('meaning_english')->nullable();
            $table->longText('meaning_nepali')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->enum('status', ['UNAPPROVED','APPROVED','DISAPPROVED'])->default('UNAPPROVED');
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
        Schema::dropIfExists('glossaries');
    }
}
