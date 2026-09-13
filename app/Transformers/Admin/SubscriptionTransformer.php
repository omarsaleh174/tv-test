<?php

namespace App\Transformers\Admin;

use League\Fractal\TransformerAbstract;
use App\Entities\Admin\Subscription;

/**
 * Class SubscriptionTransformer.
 *
 * @package namespace App\Transformers\Admin;
 */
class SubscriptionTransformer extends TransformerAbstract
{
    /**
     * Transform the Subscription entity.
     *
     * @param \App\Entities\Admin\Subscription $model
     *
     * @return array
     */
    public function transform(Subscription $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
