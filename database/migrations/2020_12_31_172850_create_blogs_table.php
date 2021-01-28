<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->integer("category_id");
            $table->string("title");
            $table->string("slug");
            $table->longText("short_description");
            $table->longText("content");
            $table->integer("status");
            $table->string("thumbnail");
            $table->integer("views")->default(0);
            $table->text("meta_title")->nullable();
            $table->text("meta_keyword")->nullable();
            $table->longText("meta_description")->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('blogs');
    }
}
