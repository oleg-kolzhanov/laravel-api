<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id()->comment('Идентификатор');
            $table->unsignedBigInteger('user_id')->nullable(false)->comment('Идентификатор пользователя');
            $table->string('title')->nullable(false)->comment('Заголовок поста');
            $table->longText('content')->nullable(false)->comment('Текст поста');
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
