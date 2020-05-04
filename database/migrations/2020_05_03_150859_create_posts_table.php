<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');

            /* заголовок заявки */
            $table->string('title');

            /* чья заявка */
            $table->integer('user_id');

            /* просмотрена заявка или нет  где 0 = нет 1=да */
            $table->integer('view_post')->default('0');

            /* закрыла или открыта заявка где 0 = открыта 1=закрыта*/
            $table->integer('state_post')->default('0');

            /* колличество ответов */
            $table->integer('quantity_responses')->default('0');

            /* тело заявки */
            $table->string('content');

            /* время создания заявки */
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
        Schema::dropIfExists('posts');
    }
}
