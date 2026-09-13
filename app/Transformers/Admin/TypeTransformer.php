<?php

namespace App\Transformers\Admin;

use League\Fractal\TransformerAbstract;
use App\Entities\Admin\Type;

/**
 * Class TypeTransformer.
 *
 * @package namespace App\Transformers\Admin;
 */
class TypeTransformer extends TransformerAbstract
{
    /**
     * Transform the Type entity.
     *
     * @param \App\Entities\Admin\Type $model
     *
     * @return array
     */
    public function transform(Type $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
