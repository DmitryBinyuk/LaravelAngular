<?php

namespace App\Http\Transformers;

use App\Models\Phone;
use App\Models\Brand;
use League\Fractal\TransformerAbstract;

class BrandTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'phones'
    ];

    protected $detailed;

    public function __construct($detailed = false)
    {
        $this->detailed = $detailed;
    }

    public function transform(Brand $brand)
    {
        $data = [
            'id' => (int) $brand->id,
            'name' => $brand->name,
        ];

        return $data;
    }

    public function includePhones(Phone $phone)
    {
        return $brand->phones ? $this->item($brand->phones, new PhoneTransformer()) : null;
    }
}