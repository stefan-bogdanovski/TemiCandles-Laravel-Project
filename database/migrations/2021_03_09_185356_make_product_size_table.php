<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeProductSizeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('products_sizes'))
        {
            Schema::create('products_sizes', function (Blueprint $table)
            {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('product_id')->index();
                $table->unsignedBigInteger('size_id')->index();
                $table->unsignedBigInteger('pricelist_id')->index();
                $table->foreign('product_id')
                    ->references('id')
                    ->on('products')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');
                $table->foreign('size_id')
                    ->references('id')
                    ->on('sizes')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');
                $table->foreign('pricelist_id')
                    ->references('id')
                    ->on('pricelists')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_size');
    }
}
