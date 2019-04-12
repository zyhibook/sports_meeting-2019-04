<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BaseResource extends ResourceCollection
{
    protected static function convert($collection)
    {
        $array = [];
        foreach ($collection as $k => $v) {
            $array[] = $v;
        }

        return $array;
    }
}
