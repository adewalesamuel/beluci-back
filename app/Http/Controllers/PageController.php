<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Page;
use App\Http\Auth;
use App\Http\Requests\StorePageRequest;
use App\Http\Requests\UpdatePageRequest;
use App\Models\Event;
use Exception;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	$pages = Page::where('id', '>', -1)
        ->orderBy('created_at', 'desc');

        if ($request->input('page') == null ||
            $request->input('page') == '') {
            $pages = $pages->get();
        } else {
            $pages = $pages->paginate();
        }

        $data = [
            'success' => true,
            'pages' => $pages
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
    public function store(StorePageRequest $request)
    {
        $validated = $request->validated();

        $page = new Page;

        $page->title = $validated['title'] ?? null;
        $page->slug = $validated['title'] ?? null;
		$page->description = $validated['description'] ?? null;
		$page->keywords = $validated['keywords'] ?? null;
		$page->display_img_url = $validated['display_img_url'] ?? null;
		$page->section_list = json_decode($validated['section_list']) ?? null;

        $page->save();

        $data = [
            'success'       => true,
            'page'   => $page
        ];

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        $data = [
            'success' => true,
            'page' => $page
        ];

        return response()->json($data);
    }

    public function slug_show(string $slug)
    {
        $events = [];
        $page = Page::where('slug', $slug)->firstOrFail();

        if ($slug == "accueil")
            $events = Event::orderBy('created_at', 'desc')->limit(1)->get();

        if (isset($page->section_list[1]))
            $page->section_list[1]['events'] = $events;

        $data = [
            'success' => true,
            'page' => $page->jsonserialize()
        ];

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePageRequest $request, Page $page)
    {
        $validated = $request->validated();

        $page->title = $validated['title'] ?? null;
        $page->slug = $validated['title'] ?? null;
		$page->description = $validated['description'] ?? null;
		$page->keywords = $validated['keywords'] ?? null;
		$page->display_img_url = $validated['display_img_url'] ?? null;
		$page->section_list = json_decode($validated['section_list']) ?? null;

        $page->save();

        $data = [
            'success'       => true,
            'page'   => $page
        ];

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $page->delete();

        $data = [
            'success' => true,
            'page' => $page
        ];

        return response()->json($data);
    }
}
