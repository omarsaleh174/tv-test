<?php

namespace App\Transformers\Admin;

use League\Fractal\TransformerAbstract;
use App\Entities\Admin\Client;

/**
 * Class ClientTransformer.
 *
 * @package namespace App\Transformers\Admin;
 */
class ClientTransformer extends TransformerAbstract
{
    /**
     * Transform the Client entity.
     *
     * @param \App\Entities\Admin\Client $model
     *
     * @return array
     */
    public function transform(Client $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
