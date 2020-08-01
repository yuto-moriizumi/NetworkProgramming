<?php

namespace App\Repositories;

use App\Models\wc_match;
use App\Repositories\BaseRepository;

/**
 * Class wc_matchRepository
 * @package App\Repositories
 * @version August 1, 2020, 1:41 pm UTC
*/

class wc_matchRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'round_id',
        'group_id',
        'start_date',
        'ordering',
        'knockout'
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
        return wc_match::class;
    }
}
