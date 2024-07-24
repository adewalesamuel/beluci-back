<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Forum;
use App\Http\Auth;
use App\Http\Requests\StoreForumRequest;
use App\Http\Requests\UpdateForumRequest;
use App\Models\ForumCategory;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	$forums = Forum::with(["forum_category"])
        ->orderBy('created_at', 'desc');

        if ($request->input('page') == null ||
            $request->input('page') == '') {
            $forums = $forums->get();
        } else {
            $forums = $forums->paginate();
        }

        $data = [
            'success' => true,
            'forums' => $forums
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
    public function store(StoreForumRequest $request)
    {
        $validated = $request->validated();

        $forum = new Forum;

        $forum->name = $validated['name'] ?? null;
		$forum->slug = $validated['name'] ?? null;
		$forum->display_img_url = $validated['display_img_url'] ?? null;
		$forum->description = $validated['description'] ?? null;
		$forum->is_pinned = $validated['is_pinned'] ?? null;
		$forum->member_id = $validated['member_id'] ?? null;
		$forum->forum_category_id = $validated['forum_category_id'] ?? null;

        $forum->save();

        $data = [
            'success'       => true,
            'forum'   => $forum
        ];

        return response()->json($data);
    }

    public function user_store(StoreForumRequest $request) {
        $auth_user = Auth::getUser($request, Auth::USER);

        $forum = new Forum;

        $forum->name = $validated['name'] ?? null;
		$forum->slug = $validated['name'] ?? null;
		$forum->display_img_url = $validated['display_img_url'] ?? null;
		$forum->description = $validated['description'] ?? null;
		$forum->is_pinned = $validated['is_pinned'] ?? null;
		$forum->member_id = $auth_user->id;
		$forum->forum_category_id = $validated['forum_category_id'] ?? null;

        $forum->save();

        $data = [
            'success'       => true,
            'forum'   => $forum
        ];

        return response()->json($data);

    }

    public function user_update(UpdateForumRequest $request, Forum $forum) {
        $auth_user = Auth::getUser($request, Auth::USER);
        $forum = Forum::where('member_id', $auth_user->id)
        ->where('id', $forum->id)->findOrFail();

        $forum->name = $validated['name'] ?? null;
		$forum->slug = $validated['name'] ?? null;
		$forum->display_img_url = $validated['display_img_url'] ?? null;
		$forum->description = $validated['description'] ?? null;
		$forum->is_pinned = $validated['is_pinned'] ?? null;
		$forum->member_id = $validated['member_id'] ?? null;
		$forum->forum_category_id = $validated['forum_category_id'] ?? null;

        $forum->save();

        $data = [
            'success'       => true,
            'forum'   => $forum
        ];

        return response()->json($data);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function show(Forum $forum)
    {
        $data = [
            'success' => true,
            'forum' => $forum
        ];

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function edit(Forum $forum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateForumRequest $request, Forum $forum)
    {
        $validated = $request->validated();

        $forum->name = $validated['name'] ?? null;
		$forum->slug = $validated['name'] ?? null;
		$forum->display_img_url = $validated['display_img_url'] ?? null;
		$forum->description = $validated['description'] ?? null;
		$forum->is_pinned = $validated['is_pinned'] ?? null;
		$forum->member_id = $validated['member_id'] ?? null;
		$forum->forum_category_id = $validated['forum_category_id'] ?? null;

        $forum->save();

        $data = [
            'success'       => true,
            'forum'   => $forum
        ];

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Forum $forum)
    {
        $forum->delete();

        $data = [
            'success' => true,
            'forum' => $forum
        ];

        return response()->json($data);
    }

    public function user_destroy(Request $request, Forum $forum)
    {
        $auth_user = Auth::getUser($request, Auth::USER);
        $forum = Forum::where('member_id', $auth_user->id)
        ->where('id', $forum->id)->findOrFail();

        $forum->delete();

        $data = [
            'success' => true,
            'forum' => $forum
        ];

        return response()->json($data);
    }
}
