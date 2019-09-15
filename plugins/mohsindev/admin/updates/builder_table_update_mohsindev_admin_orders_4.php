<?php namespace Mohsindev\Admin\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMohsindevAdminOrders4 extends Migration
{
    public function up()
    {
        Schema::table('mohsindev_admin_orders', function($table)
        {
            $table->decimal('price', 10, 2)->nullable()->unsigned(false)->default(null)->change();
            $table->decimal('discount', 10, 2)->nullable()->unsigned(false)->default(null)->change();
            $table->decimal('total_price', 10, 2)->nullable(false)->unsigned(false)->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('mohsindev_admin_orders', function($table)
        {
            $table->integer('price')->nullable()->unsigned(false)->default(null)->change();
            $table->integer('discount')->nullable()->unsigned(false)->default(null)->change();
            $table->integer('total_price')->nullable(false)->unsigned(false)->default(null)->change();
        });
    }
}
