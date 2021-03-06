<?php

use App\Models\Animal;
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
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->enum('gender',[Animal::GENDER_MALE,Animal::GENDER_FEMALE]);
            $table->text('description')->nullable();
            $table->float('cost')->nullable();
            $table->float('value')->nullable();
            $table->enum('is_criollo',[Animal::CRIOLLO,Animal::COMPRADO])->default(Animal::COMPRADO);
            $table->string('bought_from')->nullable();
            $table->string('sold_to')->nullable();
            $table->date('born_date')->nullable();
            $table->date('bought_date')->nullable();
            $table->date('sold_date')->nullable();
            $table->integer('bought_weight')->nullable();
            
            
            //foreign keys
            $table->unsignedBigInteger('color_id')->nullable();        
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('set null');

            $table->unsignedBigInteger('type_id')->nullable();        
            $table->foreign('type_id')->references('id')->on('types')->onDelete('set null');

            $table->unsignedBigInteger('owner_id')->nullable();        
            $table->foreign('owner_id')->references('id')->on('owners')->onDelete('set null');

            $table->unsignedBigInteger('status_id')->nullable();        
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('set null');

            $table->unsignedBigInteger('animal_id')->nullable();        
            $table->foreign('animal_id')->references('id')->on('animals')->onDelete('set null');

            $table->unsignedBigInteger('earing_color_id')->nullable();        
            $table->foreign('earing_color_id')->references('id')->on('earing_colors')->onDelete('set null');
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
        Schema::dropIfExists('animals');
    }
};
