<?php namespace Mohsindev\Admin\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateMohsindevAdminCategories extends Migration
{
    public function up()
    {
        Schema::create('mohsindev_admin_categories', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->text('name');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('mohsindev_admin_categories');
    }
}
