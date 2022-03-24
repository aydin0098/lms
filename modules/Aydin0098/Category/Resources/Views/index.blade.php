@extends('Dashboard::master')
@section('breadcrumb')
    <li><a href="{{route('categories.index')}}" title="دسته بندی ها">دسته بندی ها</a></li>
@endsection
@section('content')
    <div class="main-content padding-0 categories">
        <div class="row no-gutters  ">
            <div class="col-8 margin-left-10 margin-bottom-15 border-radius-3">
                <p class="box__title">دسته بندی ها</p>
                <div class="table__box">
                    <table class="table">
                        <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>شناسه</th>
                            <th>نام دسته بندی</th>
                            <th>نام انگلیسی دسته بندی</th>
                            <th>دسته پدر</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                        <tr role="row" class="">
                            <td><a href="">{{$category->id}}</a></td>
                            <td><a href="">{{$category->title}}</a></td>
                            <td>{{$category->slug}}</td>
                            <td>{{$category->parent}}</td>
                            <td>
                                <a href="" onclick="event.preventDefault(); deleteItem(event,'{{route('categories.destroy',$category->id)}}')" class="item-delete mlg-15" title="حذف"></a>
                                <a href=""  target="_blank" class="item-eye mlg-15" title="مشاهده"></a>
                                <a href="{{route('categories.edit',$category->id)}}" class="item-edit " title="ویرایش"></a>
                            </td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-4 bg-white">
                <p class="box__title">ایجاد دسته بندی جدید</p>
               @include('Category::create')
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('back/js/tagsInput.js')}}"></script>
    <script>
        function deleteItem(event , route){
            if(confirm('ایا از حذف ایتم انتخابی مطمئن هستید ؟')){
                $.post(route,{_method:"delete" , _token: "{{csrf_token()}}"})
                .done(function (response){
                    event.target.closest('tr').remove();
                    $.toast({
                        heading: 'عملیات موفق',
                        text: response.message,
                        showHideTransition: 'slide',
                        icon: 'success',
                        position: 'top-left',
                    })

                })
                .fail(function (response){

                });
            }
        }
    </script>
@endsection
