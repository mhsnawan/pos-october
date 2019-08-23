<?php namespace Mohsindev\Admin\Models;

use Model;

/**
 * Model
 */
class Orders extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'mohsindev_admin_orders';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    protected $fillable = ['user_id', 'price', 'discount', 'total_price', 'total'];
}
