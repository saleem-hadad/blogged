<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBloggedArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogged_articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100);
            $table->string('slug', 120)->unique()->index();
            $table->string('image', 254);
            $table->text('excerpt');
            $table->longtext('body');

            $table->datetime('publish_date')->nullable();
            $table->boolean('published')->default(false);
            $table->boolean('featured')->default(false);
            
            // TODO: users table should be dynamic..
            $table->unsignedInteger('author_id')->index();
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');;
            $table->unsignedInteger('category_id')->index();
            $table->foreign('category_id')->references('id')->on('blogged_categories')->onDelete('cascade');;
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
        Schema::dropIfExists('blogged_articles');
    }
}
