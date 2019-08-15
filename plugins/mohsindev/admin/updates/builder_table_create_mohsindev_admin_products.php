<?php namespace Mohsindev\Admin\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateMohsindevAdminProducts extends Migration
{
    public function up()
    {
        Schema::create('mohsindev_admin_products', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->integer('serial_no');
            $table->integer('barcode');
            $table->text('name');
            $table->text('company');
            $table->decimal('retail_price', 10, 0);
            $table->decimal('sale_price', 10, 0)->nullable();
            $table->decimal('discount', 10, 0)->nullable();
            $table->date('manufacturing_date');
            $table->date('expiry_date');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('mohsindev_admin_products');
    }
}
