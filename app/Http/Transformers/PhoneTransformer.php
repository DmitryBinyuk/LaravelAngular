<?php

namespace App\Http\Transformers;

use App\Models\Phone;
use App\Models\Brand;
use League\Fractal\TransformerAbstract;

class PhoneTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'brand'
    ];

//    protected $defaultIncludes = [
//        'picture',
//        'meta'
//    ];

    protected $detailed;

    public function __construct($detailed = false)
    {
        $this->detailed = $detailed;
    }

    public function transform(Phone $phone)
    {
        $brand = $phone->brand()->first();

        $data = [
            'id' => (int) $phone->id,
            'name' => $phone->name,
            'processor' => $phone->processor,
            'description' => $phone->description,
            'image' => $phone->image,
            'brand_id' => $brand ? $brand->id : null,
	    'brand_name' => $brand ? $brand->name : null,
        ];

        return $data;
    }

    public function includeBrand(Brand $brand)
    {
        return $phone->brand ? $this->item($phone->brand, new BrandTransformer()) : null;
    }
}