<?php

namespace App\Transformers;

use App\Models\Department;
use League\Fractal\TransformerAbstract;

class DepartmentTransformer extends TransformerAbstract
{
    public function transform(Department $department)
    {
        return [
            'id'                => (int) $department->id,
            'name'              => (string) $department->name,
            'company_id'        => (int) $department->company_id,
            'created_user_id'   => (int) $department->created_user_id,
        ];
    }
}
