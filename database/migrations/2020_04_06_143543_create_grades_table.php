<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('program_id')->nullable();
            $table->unsignedBigInteger('study_period_parent_id')->nullable();
            $table->unsignedBigInteger('study_period_child_id')->nullable();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('code')->unique()->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->enum('status', ['UNAPPROVED','APPROVED','DISAPPROVED'])->default('UNAPPROVED');
            $table->enum('product_type',['FREE','PREMIUM'])->default('PREMIUM');
            $table->integer('order')->default(0);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->text('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keyword')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->index(['program_id','name','slug','status']);
            $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');
            $table->foreign('study_period_parent_id')->references('id')->on('study_periods');
            $table->foreign('study_period_child_id')->references('id')->on('study_period_children');
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
        Schema::dropIfExists('classes');
    }
}
