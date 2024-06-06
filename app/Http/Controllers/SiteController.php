<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Site;
use App\Http\Auth;
use App\Http\Requests\StoreSiteRequest;
use App\Http\Requests\UpdateSiteRequest;


class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	$sites = Site::where('id', '>', -1)
        ->orderBy('created_at', 'desc');

        if ($request->input('page') == null || 
            $request->input('page') == '') {
            $sites = $sites->get();
        } else {
            $sites = $sites->paginate();
        }

        $data = [
            'success' => true,
            'sites' => $sites
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
    public function store(StoreSiteRequest $request)
    {
        $validated = $request->validated();

        $site = new Site;

        $site->logo_url = $validated['logo_url'] ?? null;
		$site->favicon_url = $validated['favicon_url'] ?? null;
		$site->name = $validated['name'] ?? null;
		$site->slogan = $validated['slogan'] ?? null;
		$site->phone_number = $validated['phone_number'] ?? null;
		$site->primary_color = $validated['primary_color'] ?? null;
		$site->secondary_color = $validated['secondary_color'] ?? null;
		$site->copyright_text = $validated['copyright_text'] ?? null;
		$site->footer_logo_url = $validated['footer_logo_url'] ?? null;
		$site->is_up = $validated['is_up'] ?? null;
		
        $site->save();

        $data = [
            'success'       => true,
            'site'   => $site
        ];
        
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function show(Site $site)
    {
        $data = [
            'success' => true,
            'site' => $site
        ];

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function edit(Site $site)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSiteRequest $request, Site $site)
    {
        $validated = $request->validated();

        $site->logo_url = $validated['logo_url'] ?? null;
		$site->favicon_url = $validated['favicon_url'] ?? null;
		$site->name = $validated['name'] ?? null;
		$site->slogan = $validated['slogan'] ?? null;
		$site->phone_number = $validated['phone_number'] ?? null;
		$site->primary_color = $validated['primary_color'] ?? null;
		$site->secondary_color = $validated['secondary_color'] ?? null;
		$site->copyright_text = $validated['copyright_text'] ?? null;
		$site->footer_logo_url = $validated['footer_logo_url'] ?? null;
		$site->is_up = $validated['is_up'] ?? null;
		
        $site->save();

        $data = [
            'success'       => true,
            'site'   => $site
        ];
        
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function destroy(Site $site)
    {   
        $site->delete();

        $data = [
            'success' => true,
            'site' => $site
        ];

        return response()->json($data);
    }
}