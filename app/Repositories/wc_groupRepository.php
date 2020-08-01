<?php

namespace App\Repositories;

use App\Models\wc_group;
use App\Repositories\BaseRepository;

/**
 * Class wc_groupRepository
 * @package App\Repositories
 * @version August 1, 2020, 1:23 pm UTC
*/

class wc_groupRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'ordering'
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
        return wc_group::class;
    }
}
