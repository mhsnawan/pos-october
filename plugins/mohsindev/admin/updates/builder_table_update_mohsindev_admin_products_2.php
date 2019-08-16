<?php namespace Mohsindev\Admin\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMohsindevAdminProducts2 extends Migration
{
    public function up()
    {
        Schema::table('mohsindev_admin_products', function($table)
        {
            $table->decimal('retail_price', 10, 0)->default(0)->change();
            $table->decimal('sale_price', 10, 0)->default(0)->change();
            $table->decimal('discount', 10, 0)->default(0)->change();
            $table->integer('stock')->default(0)->change();
        });
    }
    
    public function down()
    {
        Schema::table('mohsindev_admin_products', function($table)
        {
            $table->decimal('retail_price', 10, 0)->default(null)->change();
            $table->decimal('sale_price', 10, 0)->default(null)->change();
            $table->decimal('discount', 10, 0)->default(null)->change();
            $table->integer('stock')->default(null)->change();
        });
    }
}
