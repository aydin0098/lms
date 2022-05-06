<?php

namespace Aydin0098\Course\Http\Controllers;

use App\Http\Controllers\Controller;
use Aydin0098\Category\Repositories\CategoryRepo;
use Aydin0098\Course\Http\Requests\CourseRequest;
use Aydin0098\Course\Repositories\CourseRepo;
use Aydin0098\Media\Services\MediaUploadService;
use Aydin0098\User\Repositories\UserRepo;

class CourseController extends Controller
{
    public function index(CourseRepo $courseRepo)
    {
        $courses = $courseRepo->paginate();
        return view('Course::index',compact('courses'));

    }

    public function create(UserRepo $userRepo, CategoryRepo $categoryRepo)
    {
        $teachers = $userRepo->getTeachers();
        $categories = $categoryRepo->all();
        return view('Course::create', compact('teachers', 'categories'));

    }

    public function store(CourseRequest $request, CourseRepo $courseRepo)
    {
        $request->request->add(['banner_id' => MediaUploadService::upload($request->file('image'))->id]);

        $courseRepo->store($request);
        return redirect()->route('courses.index');

    }

}
