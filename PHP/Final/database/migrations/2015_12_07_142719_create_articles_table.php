<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('articles', function(Blueprint $table)
		{
			$table->increments('article_id');
            $table->string('name');
            $table->string('title');
            $table->text('description');
            $table->boolean('all_pages');
            $table->text('html_snippet');
			$table->timestamps();
            $table->integer('user_id')->unsigned();
            //$table->integer('user_modifyBy')->unsigned();
            //$table->integer('page_id')->unsigned();
            //$table->integer('content_id')->unsigned();

            $table->foreign('user_id')
                ->references('user_id')
                ->on('users')
                ->onDelete('cascade');

//            $table->foreign('user_modifyBy')
//                ->references('user_id')
//                ->on('users')
//                ->onDelete('cascade');

//            $table->foreign('page_id')
//                ->references('page_id')
//                ->on('pages')
//                ->onDelete('cascade');
//
//            $table->foreign('content_id')
//                ->references('content_id')
//                ->on('contents')
//                ->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('articles');
	}

}
