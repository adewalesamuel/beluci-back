<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Menu;
use App\Http\Auth;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;


class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	$menus = Menu::where('id', '>', -1)
        ->orderBy('created_at', 'desc');

        if ($request->input('page') == null ||
            $request->input('page') == '') {
            $menus = $menus->get();
        } else {
            $menus = $menus->paginate();
        }

        $data = [
            'success' => true,
            'menus' => $menus
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
    public function store(StoreMenuRequest $request)
    {
        $validated = $request->validated();

        $menu = new Menu;

        $menu->name = $validated['name'] ?? null;
		$menu->description = $validated['description'] ?? null;

        $menu->save();

        $data = [
            'success'       => true,
            'menu'   => $menu
        ];

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        $menu->menu_items;
        
        $data = [
            'success' => true,
            'menu' => $menu
        ];

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMenuRequest $request, Menu $menu)
    {
        $validated = $request->validated();

        $menu->name = $validated['name'] ?? null;
		$menu->description = $validated['description'] ?? null;

        $menu->save();

        $data = [
            'success'       => true,
            'menu'   => $menu
        ];

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();

        $data = [
            'success' => true,
            'menu' => $menu
        ];

        return response()->json($data);
    }
}
