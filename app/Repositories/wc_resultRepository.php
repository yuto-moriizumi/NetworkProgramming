<?php

namespace App\Repositories;

use App\Models\wc_result;
use App\Repositories\BaseRepository;

/**
 * Class wc_resultRepository
 * @package App\Repositories
 * @version August 1, 2020, 1:41 pm UTC
*/

class wc_resultRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return wc_result::class;
    }
}
