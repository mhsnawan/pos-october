<?php namespace Mohsindev\Admin\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMohsindevAdminOrderProducts extends Migration
{
    public function up()
    {
        Schema::table('mohsindev_admin_order_products', function($table)
        {
            $table->integer('price');
        });
    }
    
    public function down()
    {
        Schema::table('mohsindev_admin_order_products', function($table)
        {
            $table->dropColumn('price');
        });
    }
}
