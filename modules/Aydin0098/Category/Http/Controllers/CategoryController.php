<?php

namespace Aydin0098\Category\Http\Controllers;

use App\Http\Controllers\Controller;
use Aydin0098\Category\Http\Requests\CategoryRequest;
use Aydin0098\Category\Models\Category;
use Aydin0098\Category\Repositories\CategoryRepo;
use Aydin0098\Category\Responses\AjaxResponses;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public $repo;
    public function __construct(CategoryRepo $categoryRepo)
    {
        $this->repo = $categoryRepo;

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->authorize('manage',Category::class);
        $categories = $this->repo->all();
        return view('Category::index',compact('categories'));
    }

    public function store(CategoryRequest $request)
    {
        $this->repo->store($request);
        return back();

    }

    public function edit($id)
    {
        $category = $this->repo->findById($id);
        $categories = $this->repo->allExceptById($id);
        return view('Category::edit',compact('category','categories'));

    }

    public function update($id , CategoryRequest $request)
    {
        $this->repo->update($id,$request);
        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        $this->repo->delete($id);
        return AjaxResponses::success();
    }

}
