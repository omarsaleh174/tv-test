<?php

namespace App\Repositories\Admin;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Admin\TenderRepository;
use App\Entities\Admin\Tender;
use App\Validators\Admin\TenderValidator;

/**
 * Class TenderRepositoryEloquent.
 *
 * @package namespace App\Repositories\Admin;
 */
class TenderRepositoryEloquent extends BaseRepository implements TenderRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Tender::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
