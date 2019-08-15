<?php namespace Mohsindev\Admin\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateMohsindevAdminExpenses extends Migration
{
    public function up()
    {
        Schema::create('mohsindev_admin_expenses', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->text('name');
            $table->integer('price');
            $table->text('description')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('mohsindev_admin_expenses');
    }
}
