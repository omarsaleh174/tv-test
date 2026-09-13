<?php

namespace App\Transformers\Admin;

use League\Fractal\TransformerAbstract;
use App\Entities\Admin\Tender;

/**
 * Class TenderTransformer.
 *
 * @package namespace App\Transformers\Admin;
 */
class TenderTransformer extends TransformerAbstract
{
    /**
     * Transform the Tender entity.
     *
     * @param \App\Entities\Admin\Tender $model
     *
     * @return array
     */
    public function transform(Tender $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
