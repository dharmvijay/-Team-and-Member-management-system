<?php

namespace App\Presenters;

use App\Transformers\MembersTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class MembersPresenter
 *
 * @package namespace App\Presenters;
 */
class MembersPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new MembersTransformer();
    }
}
