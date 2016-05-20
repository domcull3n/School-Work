<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pages', function(Blueprint $table)
		{
			$table->increments('page_id');
            $table->string('name');
            $table->string('alias');
            $table->text('description');
			$table->timestamps();
            $table->integer('user_id')->unsigned();
//            $table->integer('user_modifyBy')->unsigned();

            $table->foreign('user_id')
                ->references('user_id')
                ->on('users')
                ->onDelete('cascade');

//            $table->foreign('user_modifyBy')
//                ->references('user_id')
//                ->on('users')
//                ->onDelete('cascade');
		});

        Schema::create('article_pages', function(Blueprint $table)
        {
            $table->integer('article_id')->unsigned()->index();
            $table->foreign('article_id')
                ->references('article_id')
                ->on('articles')
                ->onDelete('cascade');

            $table->integer('page_id')->unsigned()->index();
            $table->foreign('page_id')
                ->references('page_id')
                ->on('pages')
                ->onDelete('cascade');

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
		Schema::drop('pages');
        Schema::drop('article_pages');
	}

}
