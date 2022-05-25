<?php

namespace Aydin0098\Course\Http\Controllers;

use App\Http\Controllers\Controller;
use Aydin0098\Category\Repositories\CategoryRepo;
use Aydin0098\Course\Http\Requests\CourseRequest;
use Aydin0098\Course\Models\Course;
use Aydin0098\Course\Repositories\CourseRepo;
use Aydin0098\Course\Responses\AjaxResponses;
use Aydin0098\Media\Services\MediaFileService;
use Aydin0098\User\Repositories\UserRepo;

class CourseController extends Controller
{
    public function index(CourseRepo $courseRepo)
    {
        $this->authorize('Manage',Course::class);
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
        $request->request->add(['banner_id' => MediaFileService::upload($request->file('image'))->id]);

        $courseRepo->store($request);
        return redirect()->route('courses.index');

    }

    public function edit($id,CourseRepo $courseRepo , UserRepo $userRepo,CategoryRepo $categoryRepo)
    {
        $course = $courseRepo->findById($id);
        $teachers = $userRepo->getTeachers();
        $categories = $categoryRepo->all();
        return view('Course::edit',compact('course','teachers','categories'));

    }

    public function update($id, CourseRequest $request, CourseRepo $courseRepo)
    {
        $course = $courseRepo->findByid($id);
        if ($request->hasFile('image')) {
            $request->request->add(['banner_id' => MediaFileService::upload($request->file('image'))->id]);
            $course->banner->delete();
        } else {
            $request->request->add(['banner_id' => $course->banner_id]);
        }
        $courseRepo->update($id, $request);
        return redirect(route('courses.index'));
    }

    public function destroy($id,CourseRepo $courseRepo)
    {
        $course = $courseRepo->findById($id);
        if ($course->banner){
            $course->banner->delete();
        }
        $course->delete();
        return AjaxResponses::success();
    }

    public function accept(CourseRepo $courseRepo , $id)
    {
        if ($courseRepo->updateConfirmationStatus($id,Course::CONFIRMATION_STATUS_ACCEPTED))
        {
            return AjaxResponses::success();

        }

        return AjaxResponses::Failed();


    }
    public function reject(CourseRepo $courseRepo , $id)
    {
        if ($courseRepo->updateConfirmationStatus($id,Course::CONFIRMATION_STATUS_REJECTED))
        {
            return AjaxResponses::success();

        }

        return AjaxResponses::Failed();


    }

    public function lock(CourseRepo $courseRepo , $id)
    {
        if ($courseRepo->updateStatus($id,Course::STATUS_LOCKED))
        {
            return AjaxResponses::success();

        }

        return AjaxResponses::Failed();

    }
}
