<?php namespace Mohsindev\Admin\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateMohsindevAdminOrders extends Migration
{
    public function up()
    {
        Schema::create('mohsindev_admin_orders', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('price')->nullable();
            $table->decimal('collected_cash', 10, 0);
            $table->decimal('discount', 10, 0)->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('mohsindev_admin_orders');
    }
}
