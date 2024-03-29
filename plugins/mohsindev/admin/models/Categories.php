<?php namespace Mohsindev\Admin\Models;

use Model;

/**
 * Model
 */
class Categories extends Model
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
    public $table = 'mohsindev_admin_categories';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    protected $fillable = ['name'];
}
