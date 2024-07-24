<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\ForumCategory;
use App\Http\Auth;
use App\Http\Requests\StoreForumCategoryRequest;
use App\Http\Requests\UpdateForumCategoryRequest;


class ForumCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	$forum_categorys = ForumCategory::where('id', '>', -1)
        ->orderBy('created_at', 'desc');

        if ($request->input('page') == null ||
            $request->input('page') == '') {
            $forum_categorys = $forum_categorys->get();
        } else {
            $forum_categorys = $forum_categorys->paginate();
        }

        $data = [
            'success' => true,
            'forum_categorys' => $forum_categorys
        ];

        return response()->json($data);
    }

    public function forums(Request $request)
    {
    	$forum_categorys = ForumCategory::with(["forums"])
        ->orderBy('created_at', 'desc');

        if ($request->input('page') == null ||
            $request->input('page') == '') {
            $forum_categorys = $forum_categorys->get();
        } else {
            $forum_categorys = $forum_categorys->paginate();
        }

        $data = [
            'success' => true,
            'forum_categorys' => $forum_categorys
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
    public function store(StoreForumCategoryRequest $request)
    {
        $validated = $request->validated();

        $forum_category = new ForumCategory;

        $forum_category->display_img_url = $validated['display_img_url'] ?? null;
		$forum_category->name = $validated['name'] ?? null;
		$forum_category->slug = $validated['slug'] ?? null;
		$forum_category->description = $validated['description'] ?? null;
		$forum_category->forum_category_id = $validated['forum_category_id'] ?? null;

        $forum_category->save();

        $data = [
            'success'       => true,
            'forum_category'   => $forum_category
        ];

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ForumCategory  $forum_category
     * @return \Illuminate\Http\Response
     */
    public function show(ForumCategory $forum_category)
    {
        $data = [
            'success' => true,
            'forum_category' => $forum_category
        ];

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ForumCategory  $forum_category
     * @return \Illuminate\Http\Response
     */
    public function edit(ForumCategory $forum_category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ForumCategory  $forum_category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateForumCategoryRequest $request, ForumCategory $forum_category)
    {
        $validated = $request->validated();

        $forum_category->display_img_url = $validated['display_img_url'] ?? null;
		$forum_category->name = $validated['name'] ?? null;
		$forum_category->slug = $validated['slug'] ?? null;
		$forum_category->description = $validated['description'] ?? null;
		$forum_category->forum_category_id = $validated['forum_category_id'] ?? null;

        $forum_category->save();

        $data = [
            'success'       => true,
            'forum_category'   => $forum_category
        ];

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ForumCategory  $forum_category
     * @return \Illuminate\Http\Response
     */
    public function destroy(ForumCategory $forum_category)
    {
        $forum_category->delete();

        $data = [
            'success' => true,
            'forum_category' => $forum_category
        ];

        return response()->json($data);
    }
}
