<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('comment');
            
            $table->unsignedBigInteger('animal_id')->nullable();        
            $table->foreign('animal_id')->references('id')->on('animals')->onDelete('set null');

            $table->unsignedBigInteger('comment_type_id')->nullable();        
            $table->foreign('comment_type_id')->references('id')->on('comment_types')->onDelete('set null');

            $table->unsignedBigInteger('user_id');        
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('comments');
    }
};
