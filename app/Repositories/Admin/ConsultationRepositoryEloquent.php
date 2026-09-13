<?php

namespace App\Repositories\Admin;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Admin\ConsultationRepository;
use App\Entities\Admin\Consultation;
use App\Validators\Admin\ConsultationValidator;

/**
 * Class ConsultationRepositoryEloquent.
 *
 * @package namespace App\Repositories\Admin;
 */
class ConsultationRepositoryEloquent extends BaseRepository implements ConsultationRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Consultation::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
