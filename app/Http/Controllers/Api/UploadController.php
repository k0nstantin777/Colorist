<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\File;
use App\Models\Image;
use App\Includes\Classes\Uploader;


class UploadController extends Controller
{
    public function imgProfileUpload(Request $request, Uploader $uploader)
    {
        $file = $request->file('file'); 
        if (!$file){
            throw new \Exception('Вначале нужно выбрать изображение');
        }
        
        $crop = [];
        if ($request->input('w') !== null){
            $crop = [
                'w' => $request->input('w'),
                'h' => $request->input('h'),
                'x' => $request->input('x'),
                'y' => $request->input('y'),
            ];
        }
        
        $user = User::where('name', $request->input('userName'))->first();
        $img = $uploader->upload($request, 'userfile', $crop);
               
        $image_id = $user->profile->image_id;
        if ($image_id !== null){
            $image = Image::find($image_id);
            if (File::exists('userfiles/'.$image->path)){
                File::delete('userfiles/'.$image->path);
            } 
            $image->delete();
            
        }
                      
        Profile::find($user->id)->update(['image_id' => $img->id]);
        
        return config('imagestorage.userFilesPath').$img->path;
    }
}
