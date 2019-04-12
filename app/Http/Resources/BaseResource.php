<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

class BaseResource extends ResourceCollection
{
    protected static function convert(Collection $collection)
    {
        return array_values($collection->toArray());
    }
}
