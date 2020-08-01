<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class test
 * @package App\Models
 * @version August 1, 2020, 1:14 pm UTC
 *
 */
class test extends Model
{

    public $table = 'tests';
    



    public $fillable = [
        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
