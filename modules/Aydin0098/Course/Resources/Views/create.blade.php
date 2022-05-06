@extends('Dashboard::master')
@section('breadcrumb')
    <li><a href="{{route('courses.index')}}" title="دوره ها">دوره ها</a></li>
@endsection

@section('content')
    <div class="main-content padding-0">
        <p class="box__title">ایجاد دوره جدید</p>
        <div class="row no-gutters bg-white">
            <div class="col-12">
                <form action="{{route('courses.store')}}" method="post" enctype="multipart/form-data"
                      class="padding-30">
                    @csrf
                    <input type="text" class="text" name="title" placeholder="عنوان دوره">
                    <input type="text" name="slug" class="text text-left " placeholder="نام انگلیسی دوره">

                    <div class="d-flex multi-text">
                        <input type="text" name="priority" class="text text-left mlg-15" placeholder="ردیف دوره">
                        <input type="text" name="price" placeholder="مبلغ دوره" class="text-left text mlg-15">
                        <input type="text" name="percent" placeholder="درصد مدرس" class="text-left text">
                    </div>
                    <select name="teacher_id">
                        <option value="0">انتخاب مدرس دوره</option>
                        @foreach($teachers as $teacher)
                            <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                        @endforeach
                    </select>

                    <ul class="tags">

                        <li class="addedTag">dsfsdf<span class="tagRemove" onclick="$(this).parent().remove();">x</span>
                            <input type="hidden" value="dsfsdf" name="tags[]"></li>
                        <li class="addedTag">dsfsdf<span class="tagRemove" onclick="$(this).parent().remove();">x</span>
                            <input type="hidden" value="dsfsdf" name="tags[]"></li>
                        <li class="tagAdd taglist">
                            <input type="text" id="search-field">
                        </li>
                    </ul>
                    <select name="type" required>
                        <option value="0">نوع دوره</option>
                        @foreach(\Aydin0098\Course\Models\Course::$types as $type)
                            <option value="{{$type}}">@lang($type)</option>
                        @endforeach
                    </select>
                    <select name="status" required>
                        <option value="0">وضعیت دوره</option>
                        @foreach(\Aydin0098\Course\Models\Course::$statuses as $status)
                        <option value="{{$status}}">@lang($status)</option>
                        @endforeach
                    </select>
                    <select name="category_id" required>
                        <option value="0"> دسته بندی</option>
                        @foreach($categories as $cat)
                            @if($cat->parent)
                                <option value="{{$cat->id}}">

                                    {{$cat->title}}
                                    ({{$cat->parent}})
                                </option>
                            @else
                                <option value="{{$cat->id}}">{{$cat->title}}</option>
                            @endif

                        @endforeach
                    </select>
                    <div class="file-upload">
                        <div class="i-file-upload">
                            <span>آپلود بنر دوره</span>
                            <input type="file" class="file-upload" id="files" name="image" required>
                        </div>
                        <span class="filesize"></span>
                        <span class="selectedFiles">فایلی انتخاب نشده است</span>
                    </div>
                    <textarea name="body" placeholder="توضیحات دوره" class="text h"></textarea>
                    <button class="btn btn-brand" type="submit">ایجاد دوره</button>
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
