<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Message;
use App\Http\Auth;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Models\Forum;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	$messages = Message::where('id', '>', -1)
        ->orderBy('created_at', 'desc');

        if ($request->input('page') == null ||
            $request->input('page') == '') {
            $messages = $messages->get();
        } else {
            $messages = $messages->paginate();
        }

        $data = [
            'success' => true,
            'messages' => $messages
        ];

        return response()->json($data);
    }

    public function forum_index(Request $request, Forum $forum) {
        $data = [
            'success' => true,
            'messages' => $forum->messages()->orderBy('created_at', 'desc')
            ->with(['member'])->paginate()
        ];

        return response()->json($data, 200);
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
    public function store(StoreMessageRequest $request)
    {
        $validated = $request->validated();

        $message = new Message;

        $message->content = $validated['content'] ?? null;
		$message->member_id = $validated['member_id'] ?? null;
		$message->forum_id = $validated['forum_id'] ?? null;

        $message->save();

        $data = [
            'success'       => true,
            'message'   => $message
        ];

        return response()->json($data);
    }

    public function user_store(StoreMessageRequest $request) {
        $auth_user = Auth::getUser($request, Auth::USER);

        $validated = $request->validated();

        $message = new Message;

        $message->content = $validated['content'] ?? null;
		$message->member_id = $auth_user->id;
		$message->forum_id = $validated['forum_id'] ?? null;

        $message->save();

        $data = [
            'success'       => true,
            'message'   => $message
        ];

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        $data = [
            'success' => true,
            'message' => $message
        ];

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMessageRequest $request, Message $message)
    {
        $validated = $request->validated();

        $message->content = $validated['content'] ?? null;
		$message->member_id = $validated['member_id'] ?? null;
		$message->forum_id = $validated['forum_id'] ?? null;

        $message->save();

        $data = [
            'success'       => true,
            'message'   => $message
        ];

        return response()->json($data);
    }

    public function user_update(UpdateMessageRequest $request, Message $message) {
        $auth_user = Auth::getUser($request, Auth::USER);
        $validated = $request->validated();

        $message = Message::where('member_id', $auth_user->id)
        ->where('id', $message->id)->findOrFail();

        $message->content = $validated['content'] ?? null;
		$message->member_id = $auth_user->id;
		$message->forum_id = $validated['forum_id'] ?? null;

        $message->save();

        $data = [
            'success'       => true,
            'message'   => $message
        ];

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        $message->delete();

        $data = [
            'success' => true,
            'message' => $message
        ];

        return response()->json($data);
    }

    public function user_destroy(Request $request, Message $message)
    {
        $auth_user = Auth::getUser($request, Auth::USER);
        $message = Message::where('member_id', $auth_user->id)
        ->where('id', $message->id)->findOrFail();

        $message->delete();

        $data = [
            'success' => true,
            'message' => $message
        ];

        return response()->json($data);
    }
}
