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
        $input['profit'] = $input['purchase_price'] - $input['sale_price'];
        ProductsModel::create($input);
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
            $check->update($input);
            Flash::success('Product has been updated');
        }
    }

    public function onDeleteProduct() {
        $id = post('id');
        $gethospital = ProductsModel::where('id',$id)->delete();
        Flash::success('Product deleted successfuly');
    }
}
