<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class wc_tournament
 * @package App\Models
 * @version August 1, 2020, 1:40 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $wcRounds
 * @property string $name
 * @property string $start_date
 * @property string $year
 * @property string $country
 */
class wc_tournament extends Model
{

    public $table = 'wc_tournament';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'name',
        'start_date',
        'year',
        'country'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'start_date' => 'date',
        'year' => 'string',
        'country' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'start_date' => 'required',
        'year' => 'required',
        'country' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function wcRounds()
    {
        return $this->hasMany(\App\Models\WcRound::class, 'tournament_id');
    }
}
