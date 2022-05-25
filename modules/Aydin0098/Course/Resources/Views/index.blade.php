@extends('Dashboard::master')
@section('breadcrumb')
    <li><a href="{{route('courses.index')}}" title="دوره ها">دوره ها</a></li>
@endsection
@section('styles')
    <link rel="stylesheet" href="{{asset('back/select2.min.css')}}">
    <style>
        .permissions {
            color: white;
            background-color: #2b2e9d;
            padding: 5px;
            font-size: 11px;
            border-radius: 12px;
            margin-bottom: 4px;
            display: inline-block;
        }
    </style>
@endsection
@section('content')
    <div class="main-content">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item is-active" href="{{route('courses.index')}}">لیست دوره ها</a>
                <a class="tab__item" href="approved.html">دوره های تایید شده</a>
                <a class="tab__item" href="new-course.html">دوره های تایید نشده</a>
                <a class="tab__item" href="{{route('courses.create')}}">ایجاد دوره جدید</a>
            </div>
        </div>
        <div class="bg-white padding-20">
            <div class="t-header-search">
{{--                <form action="" onclick="event.preventDefault();">--}}
{{--                    <div class="t-header-searchbox font-size-13">--}}
{{--                        <div type="text" class="text search-input__box ">جستجوی دوره</div>--}}
{{--                        <div class="t-header-search-content ">--}}
{{--                            <input type="text"  class="text"  placeholder="نام دوره">--}}
{{--                            <input type="text"  class="text" placeholder="ردیف">--}}
{{--                            <input type="text"  class="text" placeholder="قیمت">--}}
{{--                            <input type="text"  class="text" placeholder="نام مدرس">--}}
{{--                            <input type="text"  class="text margin-bottom-20" placeholder="دسته بندی">--}}
{{--                            <btutton class="btn btn-brand">جستجو</btutton>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}
            </div>
        </div>
        <div class="table__box">
            <table class="table">

                <thead role="rowgroup">
                <tr role="row" class="title-row">
                    <th>شناسه</th>
                    <th>تصویر دوره</th>
                    <th>عنوان</th>
                    <th>مدرس دوره</th>
                    <th>قیمت (تومان)</th>
                    <th>جزئیات</th>
                    <th>تراکنش ها</th>
                    <th>نظرات</th>
                    <th>تعداد دانشجویان</th>
                    <th> وضعیت</th>
                    <th>درصد مدرس</th>
                    <th>وضعیت دوره</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($courses as $course)
                <tr role="row" >
                    <td><a href="">{{$course->id}}</a></td>
                    <td><a href=""><img width="80" src="{{$course->banner->thumb}}"></a></td>
                    <td><a href="">{{$course->title}}</a></td>
                    <td><a href="">{{$course->teacher->name}}</a></td>
                    <td>{{number_format($course->price)}}</td>
                    <td><a href="course-detail.html" class="color-2b4a83">مشاهده</a></td>
                    <td><a href="course-transaction.html" class="color-2b4a83" >مشاهده</a></td>
                    <td><a href="" class="color-2b4a83" >مشاهده (10 نظر)</a></td>
                    <td>120</td>
                    <td class="confirm_status">@lang($course->confirmation_status)</td>
                    <td>{{$course->percent}}%</td>
                    <td class="status">@lang($course->status)</td>
                    <td>
                        <a href="" onclick="event.preventDefault(); deleteItem(event,'{{route('courses.destroy',$course->id)}}')" class="item-delete mlg-15" title="حذف"></a>
                        <a href="" onclick="updateConfirmationStatus(event,'{{route('courses.reject',$course->id)}}'
                            ,'ایا از رد ایتم انتخابی مطمئن هستید ؟','رد شده' )" class="item-reject mlg-15" title="رد"></a>
                        <a href="" onclick="updateConfirmationStatus(event,'{{route('courses.lock',$course->id)}}'
                            ,'ایا از قفل ایتم انتخابی مطمئن هستید ؟','قفل شده','status')" class="item-lock mlg-15" title="قفل دوره"></a>
                        <a href="" target="_blank" class="item-eye mlg-15" title="مشاهده"></a>
                        <a href="" onclick="updateConfirmationStatus(event,'{{route('courses.accept',$course->id)}}'
                            ,'ایا از تایید ایتم انتخابی مطمئن هستید ؟','تایید شده')" class="item-confirm mlg-15 " title="تایید"></a>
                        <a href="{{route('courses.edit',$course->id)}}" class="item-edit " title="ویرایش"></a>
                    </td>
                </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('back/select2.min.js')}}"></script>
    <script>

        function updateConfirmationStatus(event,route,message,status,field = 'confirm_status'){
            event.preventDefault();
            if (confirm(message)) {
                $.post(route, {_method: "PATCH", _token: "{{csrf_token()}}"})
                    .done(function (response) {
                        $(event.target).closest('tr').find('td.'+field).text(status);
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

        //delete Item
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
    <script>
        $(document).ready(function () {
            $('.select2').select2();
        });
    </script>
@endsection
