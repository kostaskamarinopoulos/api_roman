<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class RomanResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
                'id' => $this->id,
                'integer' => $this->number,
                'roman_code' => $this->roman_code,
                'updated_at' => date($this->updated_at),
            ];
    }

    public function with($request){
        return ['status' => 'success'];
    }
}
