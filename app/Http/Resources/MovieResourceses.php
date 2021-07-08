<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CategoryResourceses as CategoryResource;
use App\Models\Category;
class MovieResourceses extends JsonResource
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
            'title'=>$this->title,
            'category_id'=> Category::where('id',$this->category_id)->first()->name,
            'description'=>$this->description,
            'artist' => $this->artist,
            'image' => $this->image,
            'created_at' => $this->created_at,
            'update_at' => $this->updated_at  
        ];
    }
}
