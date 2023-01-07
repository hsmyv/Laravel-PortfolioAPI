<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('portfolio_id')->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger('user_id')->constrained()->cascadeOnDelete();
            $table->string('email');
            $table->string('phone_number');
            $table->string('address');
            $table->string('birthday');
            $table->string('website_url')->default();
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
        Schema::dropIfExists('contacts');
    }
}
