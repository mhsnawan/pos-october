<?php namespace Mohsindev\Admin\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMohsindevAdminOrders2 extends Migration
{
    public function up()
    {
        Schema::table('mohsindev_admin_orders', function($table)
        {
            $table->integer('total_price');
        });
    }
    
    public function down()
    {
        Schema::table('mohsindev_admin_orders', function($table)
        {
            $table->dropColumn('total_price');
        });
    }
}
