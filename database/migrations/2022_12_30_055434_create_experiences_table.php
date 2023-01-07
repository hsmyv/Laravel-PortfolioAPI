<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('portfolio_id')->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger('user_id')->constrained()->cascadeOnDelete();
            $table->string("title");
            $table->string('employment_type');
            $table->string('company_name');
            $table->string('location_type');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('industry');
            $table->string('description');
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
        Schema::dropIfExists('experiences');
    }
}
