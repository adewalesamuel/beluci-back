<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGalleryTypeRequest;
use App\Http\Requests\UpdateGalleryTypeRequest;
use App\Models\GalleryType;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Throw_;

class GalleryTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	$gallery_types = GalleryType::where('id', '>', -1)
        ->orderBy('created_at', 'desc');

        if ($request->input('page') == null ||
            $request->input('page') == '') {
            $gallery_types = $gallery_types->get();
        } else {
            $gallery_types = $gallery_types->paginate();
        }

        $data = [
            'success' => true,
            'gallery_types' => $gallery_types
        ];

        return response()->json($data);
    }

    public function gallery_index(GalleryType $gallery_type)
    {
        $data = [
            'success' => true,
            'galleries' => $gallery_type->galleries()->orderBy('created_at')->get()
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
    public function store(StoreGalleryTypeRequest $request)
    {
        $validated = $request->validated();

        $gallery_type = new GalleryType;

        $gallery_type->display_img_url = $validated['display_img_url'] ?? null;
		$gallery_type->name = $validated['name'] ?? null;
		$gallery_type->slug = $validated['name'] ?? null;

        $gallery_type->save();

        $data = [
            'success'       => true,
            'gallery_type'   => $gallery_type
        ];

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery_type
     * @return \Illuminate\Http\Response
     */
    public function show(GalleryType $gallery_type)
    {
        $data = [
            'success' => true,
            'gallery_type' => $gallery_type
        ];

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery_type
     * @return \Illuminate\Http\Response
     */
    public function edit(GalleryType $gallery_type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery_type
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGalleryTypeRequest $request, GalleryType $gallery_type)
    {
        $validated = $request->validated();

        $gallery_type->display_img_url = $validated['display_img_url'] ?? null;
		$gallery_type->name = $validated['name'] ?? null;
		$gallery_type->slug = $validated['name'] ?? null;

        $gallery_type->save();

        $data = [
            'success'       => true,
            'gallery_type'   => $gallery_type
        ];

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(GalleryType $gallery_type)
    {
        $gallery_type->delete();

        $data = [
            'success' => true,
            'gallery_type' => $gallery_type
        ];

        return response()->json($data);
    }
}
