<?php

namespace App\Transformers\Admin;

use League\Fractal\TransformerAbstract;
use App\Entities\Admin\Classification;

/**
 * Class ClassificationTransformer.
 *
 * @package namespace App\Transformers\Admin;
 */
class ClassificationTransformer extends TransformerAbstract
{
    /**
     * Transform the Classification entity.
     *
     * @param \App\Entities\Admin\Classification $model
     *
     * @return array
     */
    public function transform(Classification $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
