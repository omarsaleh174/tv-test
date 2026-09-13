<?php

namespace App\Transformers\Admin;

use League\Fractal\TransformerAbstract;
use App\Entities\Admin\User;

/**
 * Class UserTransformer.
 *
 * @package namespace App\Transformers\Admin;
 */
class UserTransformer extends TransformerAbstract
{
    /**
     * Transform the User entity.
     *
     * @param \App\Entities\Admin\User $model
     *
     * @return array
     */
    public function transform(User $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
