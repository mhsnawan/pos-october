<?php namespace Mohsindev\Admin\Components;

use Cms\Classes\ComponentBase;
use Mohsindev\Admin\Models\Orders as OrdersModel;
use Mohsindev\Admin\Models\Expenses as ExpenseModel;
use Mohsindev\Admin\Models\Products as ProductModel;
use Mohsindev\Admin\Models\Purchases as PurchasesModel;
use Carbon;
use Flash;

class Sales extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Sales Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun (){
        $this->page['lowStockProducts'] = ProductModel::where('stock', '<', 10)->get();
        //$today = \Carbon\Carbon::now();
        $start_week = \Carbon\Carbon::now()->startOfWeek();
        $end_week = \Carbon\Carbon::now()->endOfWeek();
        $start_month = \Carbon\Carbon::now()->startOfMonth();
        $end_month = \Carbon\Carbon::now()->endOfMonth();
        $start_year = \Carbon\Carbon::now()->startOfYear();
        $end_year = \Carbon\Carbon::now()->endOfYear();
        $current =  \Carbon\Carbon::now()->toDateString();
        // SALES
        $total_weekly_sales = 0;
        $total_monthly_sales = 0;
        $total_yearly_sales = 0;
        $this->page['today'] = $today = OrdersModel::whereDate('created_at', $current)->get();
        $this->page['weekly'] = $weekly = OrdersModel::whereBetween('created_at', [$start_week, $end_week])->get();
        $this->page['monthly'] = $monthly = OrdersModel::whereBetween('created_at', [$start_month, $end_month])->get();
        $this->page['yearly'] = $yearly = OrdersModel::whereBetween('created_at', [$start_year, $end_year])->get();
        $this->page['today_count'] = count($today);
        $this->page['weekly_count'] = count($weekly);
        $this->page['monthly_count'] = count($monthly);
        $this->page['yearly_count'] = count($yearly);

        for($i=0; $i<count($today); $i++){
            $this->page['total_today_sales'] = $total_yearly_sales + $today[$i]->price;
        }

        for($i=0; $i<count($weekly); $i++){
            $this->page['total_weekly_sales'] = $total_weekly_sales + $weekly[$i]->price;
        }

        for($i=0; $i<count($monthly); $i++){
            $this->page['total_monthly_sales'] = $total_monthly_sales + $monthly[$i]->price;
        }

        for($i=0; $i<count($yearly); $i++){
            $this->page['total_yearly_sales'] = $total_yearly_sales + $monthly[$i]->price;
        }

        // SALES

        //PURCHASES
        $total_today_purchase = 0;
        $total_weekly_purchase = 0;
        $total_monthly_purchase = 0;
        $total_yearly_purchase = 0;
        //$t_expense = ExpenseModel::whereDate('created_at', $today)->get();
        $t_purchase = PurchasesModel::whereDate('created_at', $current)->get();
        $w_purchase = PurchasesModel::whereBetween('created_at', [$start_week, $end_week])->get();
        $m_purchase = PurchasesModel::whereBetween('created_at', [$start_month, $end_month])->get();
        $y_purchase = PurchasesModel::whereBetween('created_at', [$start_year, $end_year])->get();
        $this->page['purchase_today_count'] = count($t_purchase);
        $this->page['purchase_weekly_count'] = count($w_purchase);
        $this->page['purchase_monthly_count'] = count($m_purchase);
        $this->page['purchase_yearly_count'] = count($y_purchase);

        for($i=0; $i<count($t_purchase); $i++){
            $this->page['total_today_purchase'] = $total_today_purchase + $w_purchase[$i]->price;
        }

        for($i=0; $i<count($w_purchase); $i++){
            $this->page['total_weekly_purchase'] = $total_weekly_purchase = $total_weekly_purchase + $w_purchase[$i]->price;
        }

        for($i=0; $i<count($m_purchase); $i++){
            $this->page['total_monthly_purchase'] = $total_monthly_purchase = $total_monthly_purchase + $m_purchase[$i]->price;
        }

        for($i=0; $i<count($y_purchase); $i++){
            $this->page['total_yearly_purchase'] = $total_yearly_purchase = $total_yearly_purchase + $y_purchase[$i]->price;
        }
        //dd($t_purchase);

        // EXPENSE
        $total_today_expense = 0;
        $total_weekly_expense = 0;
        $total_monthly_expense = 0;
        $total_yearly_expense = 0;
        //$t_expense = ExpenseModel::whereDate('created_at', $today)->get();
        $t_expense = ExpenseModel::whereDate('created_at', $current)->get();
        $w_expense = ExpenseModel::whereBetween('created_at', [$start_week, $end_week])->get();
        $m_expense = ExpenseModel::whereBetween('created_at', [$start_month, $end_month])->get();
        $y_expense = ExpenseModel::whereBetween('created_at', [$start_year, $end_year])->get();
        $this->page['expense_today_count'] = count($t_expense);
        $this->page['expense_weekly_count'] = count($w_expense);
        $this->page['expense_monthly_count'] = count($m_expense);
        $this->page['expense_yearly_count'] = count($y_expense);

        for($i=0; $i<count($t_expense); $i++){
            $this->page['total_today_expense'] = $total_today_expense = $total_today_expense + $w_expense[$i]->price;
        }

        for($i=0; $i<count($w_expense); $i++){
            $this->page['total_weekly_expense'] = $total_weekly_expense = $total_weekly_expense + $w_expense[$i]->price;
        }

        for($i=0; $i<count($m_expense); $i++){
            $this->page['total_monthly_expense'] = $total_monthly_expense = $total_monthly_expense + $m_expense[$i]->price;
        }

        for($i=0; $i<count($y_expense); $i++){
            $this->page['total_yearly_expense'] = $total_yearly_expense = $total_yearly_expense + $y_expense[$i]->price;
        }

    }

    public function onSevenDays(){
        // Carbon::now();
    }
}
