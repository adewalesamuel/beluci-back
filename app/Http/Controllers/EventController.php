<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Event;
use App\Http\Auth;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	$events = Event::where('id', '>', -1)
        ->orderBy('created_at', 'desc');

        if ($request->input('page') == null ||
            $request->input('page') == '') {
            $events = $events->get();
        } else {
            $events = $events->paginate();
        }

        $data = [
            'success' => true,
            'events' => $events
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
    public function store(StoreEventRequest $request)
    {
        $validated = $request->validated();

        $event = new Event;

        $event->img_url = $validated['img_url'] ?? null;
		$event->name = $validated['name'] ?? null;
		$event->date = $validated['date'] ?? null;
		$event->time = $validated['time'] ?? null;
		$event->address = $validated['address'] ?? null;
		$event->gps_location = $validated['gps_location'] ?? null;
		$event->is_payed = $validated['is_payed'] ?? false;
		$event->price = $validated['price'] ?? null;
		$event->features = $validated['features'] ?? null;
		$event->description = $validated['description'] ?? null;

        $event->save();

        $data = [
            'success'       => true,
            'event'   => $event
        ];

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        $data = [
            'success' => true,
            'event' => $event
        ];

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        $validated = $request->validated();

        $event->img_url = $validated['img_url'] ?? null;
		$event->name = $validated['name'] ?? null;
		$event->date = $validated['date'] ?? null;
		$event->time = $validated['time'] ?? null;
		$event->address = $validated['address'] ?? null;
		$event->gps_location = $validated['gps_location'] ?? null;
		$event->is_payed = $validated['is_payed'] ?? false;
		$event->price = $validated['price'] ?? null;
		$event->features = $validated['features'] ?? null;
		$event->description = $validated['description'] ?? null;

        $event->save();

        $data = [
            'success'       => true,
            'event'   => $event
        ];

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();

        $data = [
            'success' => true,
            'event' => $event
        ];

        return response()->json($data);
    }
}
