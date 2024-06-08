<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\MenuItem;
use App\Http\Auth;
use App\Http\Requests\StoreMenuItemRequest;
use App\Http\Requests\UpdateMenuItemRequest;


class MenuItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	$menu_items = MenuItem::with(['menu', 'menu_item'])
        ->orderBy('created_at', 'desc');

        if ($request->input('page') == null ||
            $request->input('page') == '') {
            $menu_items = $menu_items->get();
        } else {
            $menu_items = $menu_items->paginate();
        }

        $data = [
            'success' => true,
            'menu_items' => $menu_items
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
    public function store(StoreMenuItemRequest $request)
    {
        $validated = $request->validated();

        $menu_item = new MenuItem;

        $menu_item->name = $validated['name'] ?? null;
		$menu_item->slug = $validated['name'] ?? null;
		$menu_item->icon_url = $validated['icon_url'] ?? null;
		$menu_item->type = $validated['type'] ?? 'link';
		$menu_item->is_accent = $validated['is_accent'] ?? false;
		$menu_item->menu_item_id = $validated['menu_item_id'] ?? null;
		$menu_item->menu_id = $validated['menu_id'] ?? null;

        $menu_item->save();

        $data = [
            'success'       => true,
            'menu_item'   => $menu_item
        ];

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MenuItem  $menu_item
     * @return \Illuminate\Http\Response
     */
    public function show(MenuItem $menu_item)
    {
        $data = [
            'success' => true,
            'menu_item' => $menu_item
        ];

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MenuItem  $menu_item
     * @return \Illuminate\Http\Response
     */
    public function edit(MenuItem $menu_item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MenuItem  $menu_item
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMenuItemRequest $request, MenuItem $menu_item)
    {
        $validated = $request->validated();

        $menu_item->name = $validated['name'] ?? null;
		$menu_item->slug = $validated['name'] ?? null;
		$menu_item->icon_url = $validated['icon_url'] ?? null;
		$menu_item->type = $validated['type'] ?? null;
		$menu_item->is_accent = $validated['is_accent'] ?? null;
		$menu_item->menu_item_id = $validated['menu_item_id'] ?? null;
		$menu_item->menu_id = $validated['menu_id'] ?? null;

        $menu_item->save();

        $data = [
            'success'       => true,
            'menu_item'   => $menu_item
        ];

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MenuItem  $menu_item
     * @return \Illuminate\Http\Response
     */
    public function destroy(MenuItem $menu_item)
    {
        $menu_item->delete();

        $data = [
            'success' => true,
            'menu_item' => $menu_item
        ];

        return response()->json($data);
    }
}
