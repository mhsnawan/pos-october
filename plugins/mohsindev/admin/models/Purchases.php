<?php namespace Mohsindev\Admin\Models;

use Model;

/**
 * Model
 */
class Purchases extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'mohsindev_admin_purchases';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    protected $fillable = ['name', 'price', 'description'];

}
