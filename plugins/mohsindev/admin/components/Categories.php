<?php namespace Mohsindev\Admin\Components;

use Cms\Classes\ComponentBase;
use Mohsindev\Admin\Models\Categories as CategoryModel;
use Illuminate\Support\Facades\Hash;
use Mohsindev\Admin\Models\Subscription as SubscriptionModel;
use Flash;

class Categories extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Categories Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun() {
        $this->page['categories'] = $category = CategoryModel::all();
       // dd($category);
    }

    public function onCreate(){
        $input = post();
        CategoryModel::create($input);
        Flash::success('Category has been added');
    }

    public function onShow() {
        $id = post('id');
        $this->page['edit'] = CategoryModel::find($id);
    }

    public function onEditCategory() {
        $input = post();
        $id = post('id');
        $check = CategoryModel::find($id);
        if($check) {
            $check->update($input);
            Flash::success('Category has been updated');
        }

    }

    public function onDeleteCategory() {
        $id = post('id');
        $gethospital = CategoryModel::where('id',$id)->delete();
        Flash::success('Category deleted successfuly');
    }

}
