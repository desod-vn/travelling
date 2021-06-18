<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boxes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('status')->nullable();
            $table->string('image');
            $table->text('content')->nullable();
            $table->string('vehicle');
            $table->string('slug');
            $table->integer('people');
            $table->date('start');
            $table->date('end');
            $table->bigInteger('fee')->default(0);
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('place_id')->constrained('places');
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
        Schema::dropIfExists('boxes');
    }
}
