<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeMenusRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('menus_roles'))
        {
            Schema::create('menus_roles', function (Blueprint $table)
            {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('menu_id')->index();
                $table->unsignedBigInteger('role_id')->index();
                $table->foreign('menu_id')->references('id')->on('menus')->onDelete('restrict')->onUpdate('cascade');
                $table->foreign('role_id')->references('id')->on('roles')->onDelete('restrict')->onUpdate('cascade');;

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
        Schema::dropIfExists('menus_roles');
    }
}
