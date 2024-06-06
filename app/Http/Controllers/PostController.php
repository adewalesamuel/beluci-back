<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Http\Auth;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	$posts = Post::where('id', '>', -1)
        ->orderBy('created_at', 'desc');

        if ($request->input('page') == null || 
            $request->input('page') == '') {
            $posts = $posts->get();
        } else {
            $posts = $posts->paginate();
        }

        $data = [
            'success' => true,
            'posts' => $posts
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
    public function store(StorePostRequest $request)
    {
        $validated = $request->validated();

        $post = new Post;

        $post->display_url = $validated['display_url'] ?? null;
		$post->title = $validated['title'] ?? null;
		$post->slug = $validated['slug'] ?? null;
		$post->content = $validated['content'] ?? null;
		$post->excerpt = $validated['excerpt'] ?? null;
		$post->author = $validated['author'] ?? null;
		$post->category_id = $validated['category_id'] ?? null;
		
        $post->save();

        $data = [
            'success'       => true,
            'post'   => $post
        ];
        
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $data = [
            'success' => true,
            'post' => $post
        ];

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $validated = $request->validated();

        $post->display_url = $validated['display_url'] ?? null;
		$post->title = $validated['title'] ?? null;
		$post->slug = $validated['slug'] ?? null;
		$post->content = $validated['content'] ?? null;
		$post->excerpt = $validated['excerpt'] ?? null;
		$post->author = $validated['author'] ?? null;
		$post->category_id = $validated['category_id'] ?? null;
		
        $post->save();

        $data = [
            'success'       => true,
            'post'   => $post
        ];
        
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {   
        $post->delete();

        $data = [
            'success' => true,
            'post' => $post
        ];

        return response()->json($data);
    }
}