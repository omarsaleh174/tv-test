<?php

namespace App\Transformers\Admin;

use League\Fractal\TransformerAbstract;
use App\Entities\Admin\Photo;

/**
 * Class PhotoTransformer.
 *
 * @package namespace App\Transformers\Admin;
 */
class PhotoTransformer extends TransformerAbstract
{
    /**
     * Transform the Photo entity.
     *
     * @param \App\Entities\Admin\Photo $model
     *
     * @return array
     */
    public function transform(Photo $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
