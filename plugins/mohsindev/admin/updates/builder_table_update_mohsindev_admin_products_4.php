<?php namespace Mohsindev\Admin\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMohsindevAdminProducts4 extends Migration
{
    public function up()
    {
        Schema::table('mohsindev_admin_products', function($table)
        {
            $table->decimal('retail_price', 10, 2)->change();
            $table->decimal('discount', 10, 2)->change();
        });
    }
    
    public function down()
    {
        Schema::table('mohsindev_admin_products', function($table)
        {
            $table->decimal('retail_price', 10, 0)->change();
            $table->decimal('discount', 10, 0)->change();
        });
    }
}
