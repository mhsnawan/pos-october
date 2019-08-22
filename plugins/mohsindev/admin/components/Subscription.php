<?php namespace Mohsindev\Admin\Components;

use Cms\Classes\ComponentBase;
use Illuminate\Support\Facades\Hash;
use Mohsindev\Admin\Models\Subscription as SubscriptionModel;
use Flash;
use Session;

class Subscription extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Subscription Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun() {
        $subs =  SubscriptionModel::find(1);
        $check = Hash::check('PqPVoRXEIV6pGjzEaMle', $subs->key);
        if($check){
            $date_check = (\Carbon\Carbon::parse($subs->expiry_date)->gt(\Carbon\Carbon::now()));
            if($date_check){
                $this->page['subCheck'] = true;
            }
        }
        else {
            $this->page['subCheck'] = false;
        }
    }

    // public function onSave() {
    //     $date = \Carbon\Carbon::now()->addYears(5);
    //     $input = post();
    //     $input['key'] = Hash::make($input['key']);
    //     $input['expiry_date'] = $date;
    //     SubscriptionModel::create($input);
    // }

    public function onGet(){
        return 'hello';
    }

    public function onSave() {
        $input = post();
        $subs =  SubscriptionModel::find(1);
        $check = Hash::check('PqPVoRXEIV6pGjzEaMle', $subs->key);
        dd($check);
        if(Hash::check('PqPVoRXEIV6pGjzEaMle', $subs->key)){
            Flash::success('Matched');
        }
        else{
            Flash::success('Not matched');
        }
        // $date = \Carbon\Carbon::now()->addYears(5);
        // $input = post();
        // $input['key'] = Hash::make($input['key']);
        // $input['expiry_date'] = $date;
        // SubscriptionModel::create($input);
    }

}
