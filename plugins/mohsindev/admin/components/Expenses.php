<?php namespace Mohsindev\Admin\Components;
use Mohsindev\Admin\Models\Expenses as ExpenseModel;
use Flash;

use Cms\Classes\ComponentBase;

class Expenses extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Expenses Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun() {
        $this->page['expenses'] = $expenses = ExpenseModel::all();
       // dd($category);
    }

    public function onCreate() {
        $input = post();
        ExpenseModel::create($input);
        Flash::success('Expense has been added');
    }

    public function onUpdate() {
        $input = post();
        $id = post('id');
        $check = ExpenseModel::find($id);
        if($check) {
            $check->update($input);
            Flash::success('Expense has been updated');
        }
    }

    public function onDelete() {
        $id = post('id');
        $gethospital = ExpenseModel::where('id',$id)->delete();
        Flash::success('Expense deleted successfuly');
    }


}
