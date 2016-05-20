<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCssesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('css', function(Blueprint $table)
		{
			$table->increments('template_id');
            $table->string('name');
            $table->text('description');
            $table->boolean('active_state');
            $table->text('css');
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
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('css');
	}

}
