<?php

namespace Aydin0098\Course\Http\Requests;

use Aydin0098\Course\Models\Course;
use Aydin0098\Course\Rules\ValidTeacher;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class CourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check() == true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:190',
            'slug' => 'required|max:190|unique:courses,slug',
            'priority' => 'nullable|numeric',
            'price' => 'required|numeric',
            'percent' => 'required|numeric',
            'teacher_id' => ['required','exists:users,id',new ValidTeacher()],
            'type' => ['required',Rule::in(Course::$types)],
            'status' => ['required',Rule::in(Course::$types)],
            'category_id' => 'required|exists:categories,id',
            'image' => 'required|mimes:jpg,png,jpeg'
        ];
    }
}
