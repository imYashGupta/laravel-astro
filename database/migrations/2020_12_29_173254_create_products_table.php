<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("slug");
            $table->text("short_description");
            $table->longText("description");
            $table->integer("category_id");
            $table->float('price',9,3);
            $table->float('discount',9,3);
            $table->integer("units");
            $table->integer("availability");
            $table->integer("min_qty");
            $table->integer("max_qty");
            $table->string("thumbnail");
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
        Schema::dropIfExists('products');
    }
}
