<?php

namespace App\Repositories\Admin;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Admin\TestRepositoryRepository;
use App\Entities\Admin\TestRepository;
use App\Validators\Admin\TestRepositoryValidator;

/**
 * Class TestRepositoryRepositoryEloquent.
 *
 * @package namespace App\Repositories\Admin;
 */
class TestRepositoryRepositoryEloquent extends BaseRepository implements TestRepositoryRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TestRepository::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
