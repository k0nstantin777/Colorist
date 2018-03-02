<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Traits\ImageMover;
use App\Http\Controllers\Controller;
use App\Models\Image;

class ImageController extends Controller
{
    use ImageMover;

    public function delete($id)
    {
        $img = Image::find($id);
        $this->removeImage($img);

        return redirect()->back()->with('success', 'Изображение удалено!');
    }
}
