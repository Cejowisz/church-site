<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Grade extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        // return parent::toArray($request);
        return [
          'id' => $this->id,
          'short_name' => $this->short_name,
          'full_name' => $this->full_name,
          'min_grade_value' => $this->min_grade_value,
          'max_grade_value' => $this->max_grade_value,
          'remark' => $this->remark,
          'created_at' => $this->created_at,
          'updated_at' => $this->updated_at
        ];
    }
}
