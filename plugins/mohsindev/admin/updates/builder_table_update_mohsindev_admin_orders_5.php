<?php namespace Mohsindev\Admin\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMohsindevAdminOrders5 extends Migration
{
    public function up()
    {
        Schema::table('mohsindev_admin_orders', function($table)
        {
            $table->decimal('profit', 10, 2);
        });
    }
    
    public function down()
    {
        Schema::table('mohsindev_admin_orders', function($table)
        {
            $table->dropColumn('profit');
        });
    }
}
