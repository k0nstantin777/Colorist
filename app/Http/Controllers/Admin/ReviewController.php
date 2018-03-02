<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ReviewFormRequest;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Support\Facades\File;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('index', Review::class);

        $reviews = Review::all();

        return view('admin.layouts.primary', [
            'page' => 'admin.pages.review.index',
            'title' => 'Отзывы',
            'reviews_active' => $reviews->where('is_active',1),
            'reviews_disable' => $reviews->where('is_active',0),
            'reviews_count' => $reviews->count(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Review::class);

        return view('admin.layouts.primary', [
            'page' => 'admin.pages.review.create',
            'title' => 'Создание отзыва',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReviewFormRequest $request)
    {
        $this->authorize('create', Review::class);

        $review = Review::create([
            'author' => $request->input('author'),
            'text' => $request->input('text'),
        ]);

        if ($request->file('file')){
            $this->saveImage($request, $review);
        }

        return redirect()->route('admin.review.index')->with('success', 'Изменения сохранены!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        $this->authorize('index', Review::class);

        $image = $this->getImage($review);
        if ($image){
            $authorImage = config('imagestorage.userFilesPath', 'userfiles/').$image->path;
        } else {
            $authorImage = config('imagestorage.defaultUserImage');
        }

        return view('admin.layouts.primary', [
            'page' => 'admin.pages.review.show',
            'title' => 'Отзыв '.$review->author,
            'review' => $review,
            'authorImage' => $authorImage,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        $this->authorize('update', Review::class);

        $image = $this->getImage($review);
        if ($image){
            $authorImage = config('imagestorage.userFilesPath', 'userfiles/').$image->path;
        } else {
            $authorImage = config('imagestorage.defaultUserImage');
        }

        return view('admin.layouts.primary', [
            'page' => 'admin.pages.review.edit',
            'title' => 'Редактирования отзыва '.$review->author,
            'review' => $review,
            'authorImage' => $authorImage,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(ReviewFormRequest $request, Review $review)
    {
        $this->authorize('update', Review::class);

        $review->update([
            'author' => $request->input('author'),
            'text' => $request->input('text'),
        ]);

        if ($request->file('file')){
            $this->saveImage($request, $review);
        }

        return redirect()->route('admin.review.index')->with('success', 'Изменения сохранены!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        $this->authorize('delete', Review::class);

        $image = $this->getImage($review);
        $this->removeImage($image);

        $review->delete();

        return redirect()->back()->with('success', 'Отзыв удален!');;
    }

    public function blockAttach(Request $request)
    {
        $blockId = $request->input('blockId');
        $max_sort = Review::where('block_id', $blockId)->max('sort');
        $reviews = $request->input('reviews');
        for ($i=0;$i<count($reviews);$i++){
            $review = Review::find($reviews[$i]);
            if($review->block_id === null) {
                $review->update([
                    'block_id' => $blockId,
                    'sort' => $max_sort+1
                ]);
            }
//            else {
//                $newReview = Review::create([
//                    'author' => $review->author,
//                    'text' => $review->text,
//                    'created_at' => $review->created_at,
//                    'block_id' => $blockId,
//                    'sort' => $max_sort+1,
//                ]);
//
//                $image = $this->getImage($review);
//                if($image !== null){
//                    Image::create([
//                        'path' => $image->path,
//                        'size' => $image->size,
//                        'oldname' => $image->oldname,
//                        'ext' => $image->ext,
//                        'mime' => $image->mime,
//                        'table_rel' => 'reviews',
//                        'table_id' => $newReview->id,
//                    ]);
//                }
//
//            }
        }


        return redirect()->back()->with('success', 'Изменения сохранены!');
    }

    public function blockDetach(Request $request, Review $review)
    {
        $review->update([
            'block_id' => null,
            'sort' => 0
        ]);

        return redirect()->back()->with('success', 'Изменения сохранены!');
    }

    private function saveImage($request, $review)
    {
        $image = $this->getImage($review);
        if ($image !== null){
            $this->removeImage($image);
        }


        $uploader = resolve('App\Includes\Classes\Uploader');
        try {
            $img = $uploader->upload($request, 'file', 'userfile');
        } catch (\ErrorException $e){
            return redirect()->back()->with('errorUpload', $e->getMessage());
        }

        $img->update([
            'table_rel' => 'reviews',
            'table_id' => $review->id,
        ]);
    }

    private function removeImage($image)
    {
        if (File::exists(config('imagestorage.userFilesPath').$image->path)){
            File::delete(config('imagestorage.userFilesPath').$image->path);
        }
        $image->delete();
    }

    private function getImage($review)
    {
        return $image = Image::where('table_rel', 'reviews')->where('table_id', $review->id)->first();
    }
}
