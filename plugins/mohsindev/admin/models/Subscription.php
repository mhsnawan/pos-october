<?php namespace Mohsindev\Admin\Models;

use Model;

/**
 * Model
 */
class Subscription extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'mohsindev_admin_subscription';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    protected $fillable = ['key', 'created_at', 'updated_at'];
}
