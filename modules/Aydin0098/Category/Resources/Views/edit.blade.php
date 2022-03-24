@extends('Dashboard::master')
@section('breadcrumb')
    <li><a href="{{route('categories.index')}}" title="دسته بندی ها">دسته بندی ها</a></li>
@endsection
@section('content')
    <div class="main-content padding-0 categories">
        <div class="row no-gutters">
            <div class="col-6 bg-white">
                <p class="box__title">ویرایش دسته بندی {{$category->title}}</p>
                <form action="{{route('categories.update',$category->id)}}" method="post" class="padding-30">
                    @csrf
                    @method('patch')
                    <input type="text" name="title" value="{{$category->title}}" placeholder="نام دسته بندی" class="text">
                    <input type="text" name="slug" value="{{$category->slug}}" placeholder="نام انگلیسی دسته بندی"
                           class="text">
                    <p class="box__title margin-bottom-15">انتخاب دسته پدر</p>
                    <select name="parent_id" id="">
                        <option value="">ندارد</option>
                        @foreach($categories as $cat)
                            <option value="{{$cat->id}}"
                                    @if($cat->id == $category->parent_id) selected @endif>{{$cat->title}}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-brand">اضافه کردن</button>
                </form>
            </div>
        </div>
    </div>

@endsection
