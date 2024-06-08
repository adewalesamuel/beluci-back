<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Gallery;
use App\Http\Auth;
use App\Http\Requests\StoreGalleryRequest;
use App\Http\Requests\UpdateGalleryRequest;


class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	$gallerys = Gallery::where('id', '>', -1)
        ->orderBy('created_at', 'desc');

        if ($request->input('page') == null ||
            $request->input('page') == '') {
            $gallerys = $gallerys->get();
        } else {
            $gallerys = $gallerys->paginate();
        }

        $data = [
            'success' => true,
            'gallerys' => $gallerys
        ];

        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGalleryRequest $request)
    {
        $validated = $request->validated();

        $gallery = new Gallery;

        $gallery->img_url = $validated['img_url'] ?? null;
		$gallery->title = $validated['title'] ?? null;
		$gallery->slug = $validated['title'] ?? null;
		$gallery->description = $validated['description'] ?? null;

        $gallery->save();

        $data = [
            'success'       => true,
            'gallery'   => $gallery
        ];

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        $data = [
            'success' => true,
            'gallery' => $gallery
        ];

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGalleryRequest $request, Gallery $gallery)
    {
        $validated = $request->validated();

        $gallery->img_url = $validated['img_url'] ?? null;
		$gallery->title = $validated['title'] ?? null;
		$gallery->slug = $validated['title'] ?? null;
		$gallery->description = $validated['description'] ?? null;

        $gallery->save();

        $data = [
            'success'       => true,
            'gallery'   => $gallery
        ];

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        $gallery->delete();

        $data = [
            'success' => true,
            'gallery' => $gallery
        ];

        return response()->json($data);
    }
}
