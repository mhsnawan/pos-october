<?php namespace Mohsindev\Admin\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMohsindevAdminOrders3 extends Migration
{
    public function up()
    {
        Schema::table('mohsindev_admin_orders', function($table)
        {
            $table->integer('discount')->nullable()->unsigned(false)->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('mohsindev_admin_orders', function($table)
        {
            $table->decimal('discount', 10, 0)->nullable()->unsigned(false)->default(null)->change();
        });
    }
}
