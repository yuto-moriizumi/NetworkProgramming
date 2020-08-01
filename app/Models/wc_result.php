<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class wc_result
 * @package App\Models
 * @version August 1, 2020, 1:41 pm UTC
 *
 * @property \App\Models\WcMatch $match
 * @property \App\Models\WcTeam $team0
 * @property \App\Models\WcTeam $team1
 * @property integer $match_id
 * @property integer $team_id0
 * @property integer $team_id1
 * @property integer $rs
 * @property string $rs_extra
 * @property string $rs_pk
 * @property string $ra
 * @property string $ra_extra
 * @property string $ra_pk
 * @property string $difference
 * @property string $outcome
 * @property string $outcome_90min
 * @property string $count_win
 * @property string $count_lose
 * @property string $count_stillmate
 * @property string $point
 * @property string $extra
 * @property integer $pk
 * @property string $duplicate
 */
class wc_result extends Model
{

    public $table = 'wc_result';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'match_id',
        'team_id0',
        'team_id1',
        'rs',
        'rs_extra',
        'rs_pk',
        'ra',
        'ra_extra',
        'ra_pk',
        'difference',
        'outcome',
        'outcome_90min',
        'count_win',
        'count_lose',
        'count_stillmate',
        'point',
        'extra',
        'pk',
        'duplicate'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'match_id' => 'integer',
        'team_id0' => 'integer',
        'team_id1' => 'integer',
        'rs' => 'integer',
        'rs_extra' => 'string',
        'rs_pk' => 'string',
        'ra' => 'string',
        'ra_extra' => 'string',
        'ra_pk' => 'string',
        'difference' => 'string',
        'outcome' => 'string',
        'outcome_90min' => 'string',
        'count_win' => 'string',
        'count_lose' => 'string',
        'count_stillmate' => 'string',
        'point' => 'string',
        'extra' => 'string',
        'pk' => 'integer',
        'duplicate' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'match_id' => 'required',
        'team_id0' => 'required',
        'team_id1' => 'required',
        'rs' => 'required',
        'ra' => 'required',
        'difference' => 'required',
        'pk' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function match()
    {
        return $this->belongsTo(\App\Models\WcMatch::class, 'match_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function team0()
    {
        return $this->belongsTo(\App\Models\WcTeam::class, 'team_id0');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function team1()
    {
        return $this->belongsTo(\App\Models\WcTeam::class, 'team_id1');
    }
}
