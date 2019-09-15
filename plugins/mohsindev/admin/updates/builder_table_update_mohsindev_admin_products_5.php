<?php namespace Mohsindev\Admin\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMohsindevAdminProducts5 extends Migration
{
    public function up()
    {
        Schema::table('mohsindev_admin_products', function($table)
        {
            $table->renameColumn('discount', 'profit');
        });
    }
    
    public function down()
    {
        Schema::table('mohsindev_admin_products', function($table)
        {
            $table->renameColumn('profit', 'discount');
        });
    }
}
