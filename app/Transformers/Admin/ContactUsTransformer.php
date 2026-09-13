<?php

namespace App\Transformers\Admin;

use League\Fractal\TransformerAbstract;
use App\Entities\Admin\ContactUs;

/**
 * Class ContactUsTransformer.
 *
 * @package namespace App\Transformers\Admin;
 */
class ContactUsTransformer extends TransformerAbstract
{
    /**
     * Transform the ContactUs entity.
     *
     * @param \App\Entities\Admin\ContactUs $model
     *
     * @return array
     */
    public function transform(ContactUs $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
