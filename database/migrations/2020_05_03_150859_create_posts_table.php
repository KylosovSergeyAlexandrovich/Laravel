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

            /* просмотрена заявка или нет */
            $table->text('view_post');

            /* закрыла или открыта заявка */
            $table->text('state_post');

            /* колличество ответов */
            $table->integer('quantity_responses');

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
