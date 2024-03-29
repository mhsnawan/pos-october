<?php namespace Mohsindev\Admin\Components;

use Cms\Classes\ComponentBase;
use Mohsindev\Admin\Models\Products as ProductsModel;
use Mohsindev\Admin\Models\Categories as CategoryModel;
use Flash;
use Session;


class Products extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Products Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun() {
        $this->page['lowStockProducts'] = ProductsModel::where('stock', '<', 10)->get();
        $products = ProductsModel::all();
        $this->page['products'] = $products;
        $this->page['categories'] = $category = CategoryModel::all();
        if(Session::get('edit_product_id')){
            $this->page['edit_product'] = ProductsModel::find(Session::get('edit_product_id'));
        }
    }

    public function onCreate() {
        $input = post();
        //dd($input);
        $input['profit'] = $input['sale_price'] - $input['purchase_price'];
        ProductsModel::create($input);
        if($input['box_purchase_price'] && $input['box_sale_price']) {
            $input['name'] = $input['name'].' - Box';
            $input['stock'] = $input['box_stock'];
            $input['purchase_price'] = $input['box_purchase_price'];
            $input['sale_price'] = $input['box_sale_price'];
            $input['profit'] = $input['sale_price'] - $input['purchase_price'];
            ProductsModel::create($input);
        }
        Flash::success('Product has been saved');
    }

    public function onEditProduct() {
        Session::put('edit_product_id',post('id'));
    }

    public function onUpdateProduct(){
        $input = post();
        $id = post('id');
        $check = ProductsModel::find($id);
        if($check) {
            //dd($check);
            $input['profit'] = $input['sale_price'] - $input['purchase_price'];
            $check->update($input);
            Flash::success('Product has been updated');
        }
    }

    public function onDeleteProduct() {
        $id = post('id');
        $gethospital = ProductsModel::where('id',$id)->delete();
        Flash::success('Product deleted successfuly');
    }

    public function onFilterLowStock() {
        //dd(post('filter'));
        $this->page['categories'] = $category = CategoryModel::all();
        $this->page['lowStockProducts'] = ProductsModel::where('stock', '<=', post('filter'))->get();
    }
}
