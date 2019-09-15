<?php namespace Mohsindev\Admin\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMohsindevAdminProducts6 extends Migration
{
    public function up()
    {
        Schema::table('mohsindev_admin_products', function($table)
        {
            $table->renameColumn('retail_price', 'purchase_price');
        });
    }
    
    public function down()
    {
        Schema::table('mohsindev_admin_products', function($table)
        {
            $table->renameColumn('purchase_price', 'retail_price');
        });
    }
}
