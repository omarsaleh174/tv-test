<?php

namespace App\Transformers\Admin;

use League\Fractal\TransformerAbstract;
use App\Entities\Admin\Department;

/**
 * Class DepartmentTransformer.
 *
 * @package namespace App\Transformers\Admin;
 */
class DepartmentTransformer extends TransformerAbstract
{
    /**
     * Transform the Department entity.
     *
     * @param \App\Entities\Admin\Department $model
     *
     * @return array
     */
    public function transform(Department $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
