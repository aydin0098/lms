@extends('Dashboard::master')
@section('breadcrumb')
    <li><a href="{{route('courses.index')}}" title="دوره ها">دوره ها</a></li>
@endsection

@section('content')
    <div class="main-content padding-0">
        <p class="box__title">ویرایش دوره {{$course->title}}</p>
        <div class="row no-gutters bg-white">
            <div class="col-12">
                <form action="{{route('courses.update',$course->id)}}" method="post" enctype="multipart/form-data"
                      class="padding-30">
                    @csrf
                    @method('patch')
                    <x-input name="title" type="text" value="{{$course->title}}" placeholder="عنوان دوره"/>
                    <x-input name="slug" type="text" value="{{$course->slug}}" placeholder="نام انگلیسی دوره"/>
                    <div class="d-flex multi-text">
                        <x-input type="number" value="{{$course->priority}}" name="priority" placeholder="ردیف دوره"/>
                        <x-input type="number" value="{{$course->price}}" name="price" placeholder="مبلغ دوره"/>
                        <x-input type="number" value="{{$course->percent}}" name="percent" placeholder="درصد مدرس"/>
                    </div>
                    <x-select name="teacher_id">
                        <option value="0">انتخاب مدرس دوره</option>
                        @foreach($teachers as $teacher)
                            <option value="{{$teacher->id}}" @if($course->teacher_id==$teacher->id) selected @endif>{{$teacher->name}}</option>
                        @endforeach
                    </x-select>

                    <x-tags-input type="hidden" name="tags[]"/>


                    <x-select name="type">
                        <option value="0">نوع دوره</option>
                        @foreach(\Aydin0098\Course\Models\Course::$types as $type)
                            <option value="{{$type}}" {{$type == $course->type ? 'selected' : ''}}>@lang($type)</option>
                        @endforeach
                    </x-select>
                    <x-select name="status">
                        <option value="0">وضعیت دوره</option>
                        @foreach(\Aydin0098\Course\Models\Course::$statuses as $status)

                            <option value="{{$status}}"
                                    {{$status == $course->status ? 'selected' : ''}}
                                    @if($status == old('status')) selected @endif
                            >@lang($status)</option>
                        @endforeach
                    </x-select>
                    <x-select name="category_id">
                        <option value="0"> دسته بندی</option>
                        @foreach($categories as $cat)
                            @if($cat->parent)
                                <option value="{{$cat->id}}" {{$cat->id == $course->category_id ? 'selected' : ''}}>

                                    {{$cat->title}}
                                    ({{$cat->parent}})
                                </option>
                            @else
                                <option value="{{$cat->id}}" {{$cat->id == $course->category_id ? 'selected' : ''}}>{{$cat->title}}</option>
                            @endif

                        @endforeach
                    </x-select>
                    <x-file-upload name="image" type="file" placeholder="آپلود بنر دوره" :value="$course->banner"/>
                    <x-text-area name="body" placeholder="توضیحات دوره" class="text h" value="{{$course->body}}"/>
                    <button class="btn btn-brand" type="submit">ویرایش دوره</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

    <script src="{{asset('back/js/tagsInput.js')}}"></script>

    <script>
        function deleteItem(event, route) {
            if (confirm('ایا از حذف ایتم انتخابی مطمئن هستید ؟')) {
                $.post(route, {_method: "delete", _token: "{{csrf_token()}}"})
                    .done(function (response) {
                        event.target.closest('tr').remove();
                        $.toast({
                            heading: 'عملیات موفق',
                            text: response.message,
                            showHideTransition: 'slide',
                            icon: 'success',
                            position: 'top-left',
                        })

                    })
                    .fail(function (response) {

                    });
            }
        }
    </script>

@endsection
