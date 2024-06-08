<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Http\Auth;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	$categorys = Category::with(['category'])
        ->orderBy('created_at', 'desc');

        if ($request->input('page') == null ||
            $request->input('page') == '') {
            $categorys = $categorys->get();
        } else {
            $categorys = $categorys->paginate();
        }

        $data = [
            'success' => true,
            'categorys' => $categorys
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
    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validated();

        $category = new Category;

        $category->display_url = $validated['display_url'] ?? null;
		$category->name = $validated['name'] ?? null;
        $category->slug = $validated['name'] ?? null;
		$category->slug = $validated['slug'] ?? null;
		$category->category_id = $validated['category_id'] ?? null;

        $category->save();

        $data = [
            'success'       => true,
            'category'   => $category
        ];

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $data = [
            'success' => true,
            'category' => $category
        ];

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $validated = $request->validated();

        $category->display_url = $validated['display_url'] ?? null;
		$category->name = $validated['name'] ?? null;
        $category->slug = $validated['name'] ?? null;
		$category->slug = $validated['slug'] ?? null;
		$category->category_id = $validated['category_id'] ?? null;

        $category->save();

        $data = [
            'success'       => true,
            'category'   => $category
        ];

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        $data = [
            'success' => true,
            'category' => $category
        ];

        return response()->json($data);
    }
}
