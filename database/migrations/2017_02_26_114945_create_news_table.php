<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category_id',11);
            $table->string('reporter_id',11);
            $table->string('news_title');
            $table->text('short_description');
            $table->text('description');
            $table->double('hit_count',7)->default(0);
            $table->string('image',50)->nullable();
            $table->string('image_title')->nullable();
            $table->tinyInteger('pub_status')->default(0);//0=unpublished; 1=published;
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
        Schema::dropIfExists('news');
    }
}
