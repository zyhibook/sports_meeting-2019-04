<?php

namespace App\Http\Resources;

class TeamResource extends BaseResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => static::convert($this->collection),
        ];
    }
}
