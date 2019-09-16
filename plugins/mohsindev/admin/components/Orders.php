<?php namespace Mohsindev\Admin\Components;

use Cms\Classes\ComponentBase;
use Mohsindev\Admin\Models\Orders as OrdersModel;
use Mohsindev\Admin\Models\OrderProducts as OrderProductsModel;
use Mohsindev\Admin\Models\Products as ProductModel;
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

    public function onRun() {
        $id = OrdersModel::latest()->first();
        if($id)
            $this->page['$invoice_id'] =$invoice_id =  $id->id + 1;
        $this->page['orders'] = OrdersModel::all();
    }

    public function onViewOrder(){
        $this->page['viewOrder'] = OrdersModel::find(8);
    }

    public function onCheckout() {
        $input = post();
        $product_ids = json_decode($input['product_ids']);
        $quantities = json_decode($input['quantities']);
        $unit_prices = json_decode($input['unit_prices']);

        $profit = 0;
        for($i=0; $i<count($product_ids); $i++){
            $product = ProductModel::find($product_ids[$i]);
            $profit = $profit + (($product->profit)*(int)$quantities[$i]);
        }
        $order = OrdersModel::create([
            'user_id' => '1',
            'price' => $input['price'],
            'discount' => $input['discount'],
            'total_price' => $input['total_price'],
            'profit' => $profit
        ]);

        for($i=0; $i<count($product_ids); $i++){
            $product = ProductModel::find($product_ids[$i]);
            $product->stock = $product->stock - (int)$quantities[$i];
            $product->save();
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
