<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Members;

/**
 * Class MembersTransformer
 * @package namespace App\Transformers;
 */
class MembersTransformer extends TransformerAbstract
{

    /**
     * Transform the \Members entity
     * @param \Members $model
     *
     * @return array
     */
    public function transform(Members $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
