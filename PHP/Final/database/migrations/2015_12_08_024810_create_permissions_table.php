<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('permissions', function(Blueprint $table)
		{
			$table->increments('permissions_id');
			$table->string('permissions');
			$table->timestamps();
		});

        Schema::create('user_permissions', function(Blueprint $table)
        {
            $table->integer('user_id')->unsigned()->index();
             $table->foreign('user_id')
                 ->references('user_id')
                 ->on('users')
                 ->onDelete('cascade');

            $table->integer('permissions_id')->unsigned()->index();
            $table->foreign('permissions_id')
                ->references('permissions_id')
                ->on('permissions')
                ->onDelete('cascade');

            //$table->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('permissions');
		Schema::drop('user_permissions');
	}

}
