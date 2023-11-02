<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $imageUrl = asset('customer_images/' . $this->image);

        return [
            'id' => $this->id,
            'image' => $imageUrl,
            'invoices' => InvoiceResource::collection($this->whenLoaded('invoices')),
        ];
    }
}
