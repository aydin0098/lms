<?php
namespace Aydin0098\Course\Http\Controllers;

use App\Http\Controllers\Controller;
use Aydin0098\Category\Repositories\CategoryRepo;
use Aydin0098\Course\Http\Requests\CourseRequest;
use Aydin0098\User\Repositories\UserRepo;

class CourseController extends Controller
{
    public function index()
    {

    }

    public function create(UserRepo $userRepo,CategoryRepo $categoryRepo)
    {
        $teachers = $userRepo->getTeachers();
        $categories = $categoryRepo->all();
        return view('Course::create',compact('teachers','categories'));

    }

    public function store(CourseRequest $request)
    {

    }

}
