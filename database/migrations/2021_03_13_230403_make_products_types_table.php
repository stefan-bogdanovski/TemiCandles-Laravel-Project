<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeProductsTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('products_types'))
        {
            Schema::create('products_types', function (Blueprint $table)
            {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('product_id')->index();
                $table->unsignedBigInteger('type_id')->index();
                $table->foreign('product_id')
                    ->references('id')
                    ->on('products')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');
                $table->foreign('type_id')
                    ->references('id')
                    ->on('types')
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
        Schema::dropIfExists('products_types');
    }
}
