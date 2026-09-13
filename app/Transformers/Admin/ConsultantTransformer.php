<?php

namespace App\Transformers\Admin;

use League\Fractal\TransformerAbstract;
use App\Entities\Admin\Consultant;

/**
 * Class ConsultantTransformer.
 *
 * @package namespace App\Transformers\Admin;
 */
class ConsultantTransformer extends TransformerAbstract
{
    /**
     * Transform the Consultant entity.
     *
     * @param \App\Entities\Admin\Consultant $model
     *
     * @return array
     */
    public function transform(Consultant $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
