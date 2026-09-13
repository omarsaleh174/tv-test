<?php

namespace App\Presenters\Admin;

use App\Transformers\Admin\ClientTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ClientPresenter.
 *
 * @package namespace App\Presenters\Admin;
 */
class ClientPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ClientTransformer();
    }
}
