<?php

namespace App\Http\Resources\orders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'user_id'=>$this->user_id,
            'user_name'=>User::find($this->user_id)->name,
            'status'=>$this->status==0?'cancelled':($this->status==1?'pending':'accepted'),
            'total_cost'=>$this->total_cost.'EGP',
            'created_at'=>Carbon::parse($this->created_at)->format('Y-m-d')
        ];
    }
}
