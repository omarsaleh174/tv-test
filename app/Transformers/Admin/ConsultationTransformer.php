<?php

namespace App\Transformers\Admin;

use League\Fractal\TransformerAbstract;
use App\Entities\Admin\Consultation;

/**
 * Class ConsultationTransformer.
 *
 * @package namespace App\Transformers\Admin;
 */
class ConsultationTransformer extends TransformerAbstract
{
    /**
     * Transform the Consultation entity.
     *
     * @param \App\Entities\Admin\Consultation $model
     *
     * @return array
     */
    public function transform(Consultation $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
