<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class wc_match
 * @package App\Models
 * @version August 1, 2020, 1:41 pm UTC
 *
 * @property \App\Models\WcRound $round
 * @property \App\Models\WcGroup $group
 * @property \Illuminate\Database\Eloquent\Collection $wcResults
 * @property integer $round_id
 * @property integer $group_id
 * @property string|\Carbon\Carbon $start_date
 * @property integer $ordering
 * @property integer $knockout
 */
class wc_match extends Model
{

    public $table = 'wc_match';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'round_id',
        'group_id',
        'start_date',
        'ordering',
        'knockout'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'round_id' => 'integer',
        'group_id' => 'integer',
        'start_date' => 'datetime',
        'ordering' => 'integer',
        'knockout' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'round_id' => 'required',
        'start_date' => 'required',
        'ordering' => 'required',
        'knockout' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function round()
    {
        return $this->belongsTo(\App\Models\WcRound::class, 'round_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function group()
    {
        return $this->belongsTo(\App\Models\WcGroup::class, 'group_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function wcResults()
    {
        return $this->hasMany(\App\Models\WcResult::class, 'match_id');
    }
}
