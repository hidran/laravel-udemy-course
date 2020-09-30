<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelsAlbumCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('album_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('category_name', 64)->unique();
            $table->bigInteger('user_id')->unsigned()->index();
            $table->foreign('user_id')->on('users')->references('id');
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('album_category', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('album_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->unique(['album_id','category_id']);
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
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('album_category');
        Schema::dropIfExists('album_categories');
    }
}
