<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete("cascade");

            $table->string('name',100)->unique();
            $table->string('code',20)->unique();
            $table->string('photo')->nullable();
            $table->float("quantity");
            $table->decimal('price', 10, 2);
            $table->decimal('Offer_price', 10, 2)->nullable();
            $table->text('short_description');
            $table->text('long_description');
            $table->tinyInteger('popular')->default(0);
            $table->tinyInteger('active')->default(1);
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
