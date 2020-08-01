<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class wc_group
 * @package App\Models
 * @version August 1, 2020, 1:23 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $wcMatches
 * @property string $name
 * @property integer $ordering
 */
class wc_group extends Model
{

    public $table = 'wc_group';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'name',
        'ordering'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'ordering' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'ordering' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function wcMatches()
    {
        return $this->hasMany(\App\Models\WcMatch::class, 'group_id');
    }
}
