<?php

namespace App\Transformers\Admin;

use League\Fractal\TransformerAbstract;
use App\Entities\Admin\Article;

/**
 * Class ArticleTransformer.
 *
 * @package namespace App\Transformers\Admin;
 */
class ArticleTransformer extends TransformerAbstract
{
    /**
     * Transform the Article entity.
     *
     * @param \App\Entities\Admin\Article $model
     *
     * @return array
     */
    public function transform(Article $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
