<?php namespace Mohsindev\Admin\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMohsindevAdminOrderProducts2 extends Migration
{
    public function up()
    {
        Schema::table('mohsindev_admin_order_products', function($table)
        {
            $table->integer('unit_price');
        });
    }
    
    public function down()
    {
        Schema::table('mohsindev_admin_order_products', function($table)
        {
            $table->dropColumn('unit_price');
        });
    }
}
