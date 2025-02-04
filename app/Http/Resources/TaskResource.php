<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'is_active' => $this->is_active,
            'project' => ProjectResource::make($this->project),
            'owner' => LoginResource::make($this->owner),
            'creator' => LoginResource::make($this->creator),
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ];
    }
}
