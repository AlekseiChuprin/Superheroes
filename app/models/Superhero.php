<?php

namespace App\models;

use App\Http\Requests\HeroRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Superhero extends Model
{
    protected $fillable = [
        'nickname', 'real_name', 'origin_description', 'superpowers', 'catch_phrase', 'image'
    ];

    /**
     * @param  HeroRequest $request
     * @return image save path
     */
    public function uploadImage(Request $request, $image = null)
    {
        if($request->hasFile('image')){
            if($image){
                Storage::delete($image);
            }
            $folder = date('Y-m-d');
            return $request->file('image')->store("images/{$folder}");
        }

        return null;
    }

    /**
     * @return path of the loaded image
     */
    public function getImage()
    {
        return ($this->image) ? asset("uploads/{$this->image}") : asset('no-image.png');
    }
}
