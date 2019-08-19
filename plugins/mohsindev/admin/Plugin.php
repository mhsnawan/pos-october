<?php namespace Mohsindev\Admin;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'Mohsindev\Admin\Components\Categories' => 'Categories',
            'Mohsindev\Admin\Components\Products' => 'Products',
            'Mohsindev\Admin\Components\Expenses' => 'Expenses',
            'Mohsindev\Admin\Components\Orders' => 'Orders',
            'Mohsindev\Admin\Components\OrderProducts' => 'OrderProducts',
            'Mohsindev\Admin\Components\Sales' => 'Sales'

        ];
    }

    public function registerSettings()
    {
    }
}
