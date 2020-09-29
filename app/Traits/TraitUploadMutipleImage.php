<?php

namespace App\Traits;

use Storage;

trait TraitUploadMutipleImage
{
    public function storageTraitMutipleUploadFile($request, $folder, $product_id)
    {
        if ($request->hasFile("image_detail")) {
            $arrayUrl = [];
            foreach ($request->image_detail as $value) {
                $nameFile = rand() . "_" . $value->getClientOriginalName();
                $path = $value->storeAs('public/' . $folder, $nameFile);
                $url = Storage::url($folder . "/" . $nameFile);
                $arrayUrl[] = [
                    'path_name_image' => $url,
                    'product_id' => $product_id,
                ];
            }
           
            return $arrayUrl;
        }
    }
}
