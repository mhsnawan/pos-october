<?php namespace Mohsindev\Admin\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMohsindevAdminOrders extends Migration
{
    public function up()
    {
        Schema::table('mohsindev_admin_orders', function($table)
        {
            $table->dropColumn('collected_cash');
        });
    }
    
    public function down()
    {
        Schema::table('mohsindev_admin_orders', function($table)
        {
            $table->decimal('collected_cash', 10, 0);
        });
    }
}
