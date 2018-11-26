<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Department extends Resource
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
          'name' => $this->name,
          'year_of_study' => $this->year_of_study,
          'head_of_department' => $this->head_of_department,
          'faculty_id' => $this->faculty_id,
          'administrator_id' => $this->administrator_id,
          'created_at' => $this->created_at,
          'updated_at' => $this->updated_at
        ];
    }
}
