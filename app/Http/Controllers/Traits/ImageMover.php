<?php

namespace App\Http\Controllers\Traits;

use App\Models\Image;
use Illuminate\Support\Facades\File;


trait ImageMover
{
    protected function saveImage($request, $name, $currentImageId = null)
    {
        $uploader = resolve('App\Includes\Classes\Uploader');

        $img = $uploader->upload($request, $name);

        if ($currentImageId) {
            $img_curr = Image::find($currentImageId);

            $img->update([
                'table_rel' => $img_curr->table_rel,
                'table_id' => $img_curr->table_id,
                'sort' => $img_curr->sort
            ]);

            $this->removeImage($img_curr);

            return;
        }

        $table = $request->input('table');
        $table_id = $request->input('table_id');
        $max_sort = Image::where('table_rel', $table)->where('table_id', $table_id)->max('sort');

        $img->update([
            'table_rel' => $table,
            'table_id' => $table_id,
            'sort' => $max_sort+1
        ]);


    }

    protected function removeImage($image)
    {
        foreach (config('imagestorage.variantsImages') as $folder => $size){
            if (File::exists(config('imagestorage.originalImagesPath').$folder.$image->path)){
                File::delete(config('imagestorage.originalImagesPath').$folder.$image->path);
            }

            if (File::exists(config('imagestorage.editionImagesPath').$folder.$image->path)){
                File::delete(config('imagestorage.editionImagesPath').$folder.$image->path);
            }

        }

        $image->delete();
    }
}