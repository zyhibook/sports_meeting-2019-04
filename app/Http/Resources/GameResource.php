<?php

namespace App\Http\Resources;

use App\Models\Game;
use Illuminate\Support\Collection;

class GameResource extends BaseResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $new_collection = new Collection();

        foreach ($this->collection as $item) {
            $new_item = new Game();
            $new_item->name = $item->name;
            $new_item->begins_at = $item->begins_at;
            $new_item->golden_name = $item->golden_name;
            $new_item->silver_name = $item->silver_name;
            $new_item->bronze_name = $item->bronze_name;
            $new_item->golden_s_name = $item->golden_s_name;
            $new_item->silver_s_name = $item->silver_s_name;
            $new_item->bronze_s_name = $item->bronze_s_name;
            $new_item->golden_team = $item->golden->name;
            $new_item->silver_team = $item->silver->name;
            $new_item->bronze_team = $item->bronze->name;
            $new_item->golden_s_team = $item->golden_s->name;
            $new_item->silver_s_team = $item->silver_s->name;
            $new_item->bronze_s_team = $item->bronze_s->name;

            $new_collection->add($new_item);
        }
        return [
            'data' => static::convert($new_collection),
        ];
    }
}
