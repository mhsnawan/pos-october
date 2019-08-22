<?php namespace Mohsindev\Admin\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateMohsindevAdminSubscription extends Migration
{
    public function up()
    {
        Schema::create('mohsindev_admin_subscription', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->text('key');
            $table->dateTime('expiry_date');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('mohsindev_admin_subscription');
    }
}
