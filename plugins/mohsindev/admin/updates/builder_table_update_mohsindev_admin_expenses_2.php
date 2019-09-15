<?php namespace Mohsindev\Admin\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMohsindevAdminExpenses2 extends Migration
{
    public function up()
    {
        Schema::table('mohsindev_admin_expenses', function($table)
        {
            $table->decimal('price', 10, 2)->nullable(false)->unsigned(false)->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('mohsindev_admin_expenses', function($table)
        {
            $table->integer('price')->nullable(false)->unsigned(false)->default(null)->change();
        });
    }
}
