<?php

namespace App\Repositories\Admin;

use App\Entities\Admin\Department;
use Prettus\Repository\Eloquent\BaseRepository;

class DepartmentRepositoryEloquent extends BaseRepository implements DepartmentRepository
{
    public function model()
    {
        return Department::class;
    }
}