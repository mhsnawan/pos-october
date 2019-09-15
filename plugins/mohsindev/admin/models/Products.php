<?php namespace Mohsindev\Admin\Models;

use Model;

/**
 * Model
 */
class Products extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'mohsindev_admin_products';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    protected $fillable = ['category_id', 'serial_no', 'barcode', 'name', 'company', 'purchase_price', 'sale_price', 'profit', 'stock', 'rack', 'manufacturing_date', 'expiry_date'];
}
