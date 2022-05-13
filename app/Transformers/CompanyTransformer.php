<?php
declare(strict_types=1);
namespace App\Transformers;

use App\Models\Company;
use League\Fractal\TransformerAbstract;

class CompanyTransformer extends TransformerAbstract
{
    public function transform(Company $company) : array
    {
        return [
            'id'                => (int) $company->id,
            'name'              => (string) $company->name,
            'address1'          => (string) $company->address1,
            'address2'          => (string) $company->address2,
            'city'              => (string) $company->city,
            'state'             => (string) $company->state,
            'zip'               => (string) $company->zip,
            'phone_no'          => (string) $company->phone_no,
            'contact'           => (string) $company->contact,
            'created_user_id'   => (int) $company->created_user_id,
        ];
    }
}
