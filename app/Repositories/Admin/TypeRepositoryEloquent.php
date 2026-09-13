<?php

namespace App\Repositories\Admin;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Admin\TypeRepository;
use App\Entities\Admin\Type;
use App\Validators\Admin\TypeValidator;

/**
 * Class TypeRepositoryEloquent.
 *
 * @package namespace App\Repositories\Admin;
 */
class TypeRepositoryEloquent extends BaseRepository implements TypeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Type::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
