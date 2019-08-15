<?php namespace Mohsindev\Admin\Components;

use Cms\Classes\ComponentBase;
use Mohsindev\Admin\Models\Orders as OrdersModel;
use Mohsindev\Admin\Models\OrderProducts as OrderProductsModel;
use Flash;

class Orders extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Orders Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onCheckout() {
        $input = post();
        $product_ids = json_decode($input['product_ids']);
        $quantities = json_decode($input['quantities']);
        $unit_prices = json_decode($input['unit_prices']);
        $order = OrdersModel::create([
            'user_id' => '1',
            'price' => $input['total'],
            'discount' => $input['discount']
        ]);

        for($i=0; $i<count($product_ids); $i++){
            $total = (int)$quantities[$i]*(int)$unit_prices[$i];
            OrderProductsModel::create([
                'order_id' => $order->id,
                'product_id' => $product_ids[$i],
                'quantity' => $quantities[$i],
                'unit_price' => $unit_prices[$i],
                'price' => $total
            ]);

        }

    }
}
