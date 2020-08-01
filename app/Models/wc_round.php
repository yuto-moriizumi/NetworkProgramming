<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class wc_round
 * @package App\Models
 * @version August 1, 2020, 1:40 pm UTC
 *
 * @property \App\Models\WcTournament $tournament
 * @property \Illuminate\Database\Eloquent\Collection $wcMatches
 * @property integer $tournament_id
 * @property string $name
 * @property integer $ordering
 * @property integer $knockout
 * @property string $start_date
 * @property string $end_date
 */
class wc_round extends Model
{

    public $table = 'wc_round';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'tournament_id',
        'name',
        'ordering',
        'knockout',
        'start_date',
        'end_date'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tournament_id' => 'integer',
        'name' => 'string',
        'ordering' => 'integer',
        'knockout' => 'integer',
        'start_date' => 'date',
        'end_date' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tournament_id' => 'required',
        'name' => 'required',
        'ordering' => 'required',
        'knockout' => 'required',
        'start_date' => 'required',
        'end_date' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tournament()
    {
        return $this->belongsTo(\App\Models\WcTournament::class, 'tournament_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function wcMatches()
    {
        return $this->hasMany(\App\Models\WcMatch::class, 'round_id');
    }
}
