<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudyPeriodChildrenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('study_period_children', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('study_period_id');
            $table->string('name')->unique();
            $table->enum('status',['Active','Inactive'])->default('Inactive');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('study_period_id')->references('id')->on('study_periods')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('study_period_children');
    }
}
