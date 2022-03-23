<?php

namespace Aydin0098\Category\Http\Controllers;

use App\Http\Controllers\Controller;
use Aydin0098\Category\Http\Requests\CategoryRequest;
use Aydin0098\Category\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //todo categories Repository
        $categories = Category::all();
        return view('Category::index',compact('categories'));
    }

    public function store(CategoryRequest $request)
    {
        Category::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'parent_id' => $request->parent_id,
        ]);

        return back();

    }

}
