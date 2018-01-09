<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrailerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trailers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category_id',3);//Movie/Drama/Short film...
            $table->string('title');//Romantic/Action..
            $table->string('story_type_id',3);//Romantic/Action..
            $table->text('summary_of_story')->nullable();
            $table->text('cast');
            $table->string('script_writer',50);
            $table->string('producer_name',50);
            $table->string('director_name',50);
            $table->text('shooting_location')->nullable();
            $table->string('released_on',15)->nullable();
            $table->string('released_no_of_hall',3)->nullable();
            $table->string('telecast_chanel',50)->nullable();
            $table->string('on_air_time',10)->nullable();
            $table->text('video_url',10);
            $table->string('trailer_image',50);
            $table->tinyInteger('pub_status')->default(0);//0=not published; 1= published
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
        Schema::dropIfExists('trailers');
    }
}
