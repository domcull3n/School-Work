<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contents', function(Blueprint $table)
		{
			$table->increments('content_id');
            $table->string('name');
            $table->string('alias');
            $table->integer('display_order');
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

        Schema::create('article_contents', function(Blueprint $table)
        {
            $table->integer('article_id')->unsigned()->index();
            $table->foreign('article_id')
                ->references('article_id')
                ->on('articles')
                ->onDelete('cascade');

            $table->integer('content_id')->unsigned()->index();
            $table->foreign('content_id')
                ->references('content_id')
                ->on('contents')
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
		Schema::drop('contents');
        Schema::drop('article_contents');
	}

}
