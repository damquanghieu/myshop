<?php

namespace App\Traits;
use Storage;

trait TraitUploadImage
{
    public function storageTraitUploadFile($request, $nameFile, $folder)
    {
      
        if ($request->hasFile($nameFile))
        {
            $newName = rand() . "_" . $request->file($nameFile)->getClientOriginalName();
            $path = $request->file($nameFile)->storeAs('public/'.$folder, $newName);
            $url = Storage::url($path);
            return $url;
        }
    }
}




?>