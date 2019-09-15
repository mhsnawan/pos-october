<?php namespace Mohsindev\Admin\Components;

use Cms\Classes\ComponentBase;
use Mohsindev\Admin\Models\Purchases as PurchasesModel;
use Flash;

class Purchases extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Purchases Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun() {
        $this->page['purchases'] = PurchasesModel::all();
    }

    public function onCreate() {
        $input = post();
        PurchasesModel::create($input);
    }

    public function onUpdate() {
        $input = post();
        $id = post('id');
        $check = PurchasesModel::find($id);
        if($check) {
            $check->update($input);
            Flash::success('Purchase has been updated');
        }
    }

    public function onDelete() {
        $id = post('id');
        $gethospital = PurchasesModel::where('id',$id)->delete();
        Flash::success('Purchase deleted successfuly');
    }

}
