<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class wc_team
 * @package App\Models
 * @version August 1, 2020, 1:41 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $wcResults
 * @property \Illuminate\Database\Eloquent\Collection $wcResult1s
 * @property string $name
 * @property string $country
 * @property string $country_now
 * @property string $area
 * @property number $lat
 * @property number $lng
 */
class wc_team extends Model
{

    public $table = 'wc_team';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'name',
        'country',
        'country_now',
        'area',
        'lat',
        'lng'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'country' => 'string',
        'country_now' => 'string',
        'area' => 'string',
        'lat' => 'float',
        'lng' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'area' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function wcResults()
    {
        return $this->hasMany(\App\Models\WcResult::class, 'team_id0');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function wcResult1s()
    {
        return $this->hasMany(\App\Models\WcResult::class, 'team_id1');
    }
}
