<?php namespace Mohsindev\Admin\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMohsindevAdminProducts extends Migration
{
    public function up()
    {
        Schema::table('mohsindev_admin_products', function($table)
        {
            $table->integer('stock');
        });
    }
    
    public function down()
    {
        Schema::table('mohsindev_admin_products', function($table)
        {
            $table->dropColumn('stock');
        });
    }
}
