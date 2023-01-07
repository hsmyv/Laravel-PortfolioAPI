<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('portfolio_id')->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger('user_id')->constrained()->cascadeOnDelete();
            $table->string('school');
            $table->string('degree');
            $table->string('fieldofstudy');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('grade');
            $table->string('activities_and_socities');
            $table->text('description');
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
        Schema::dropIfExists('educations');
    }
}
