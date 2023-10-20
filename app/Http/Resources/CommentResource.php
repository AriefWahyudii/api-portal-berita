<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            'comment_content' => $this->comment_content,
            'comentator_id' => $this->user_id,
            'post_id' => $this->whenLoaded('user'),
            'commentator' => $this->whenLoaded('user'),
            'comment_at' => date_format($this->created_at, "Y/m/d H:i:s"),
        ];
    }
}
