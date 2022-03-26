@extends('Dashboard::master')
@section('breadcrumb')
    <li><a href="{{route('role-permissions.index')}}" title="نقش های کاربری">نقش های کاربری</a></li>
@endsection
@section('content')
    <div class="main-content padding-0 categories">
        <div class="row no-gutters">
            <div class="col-6 bg-white">
                <p class="box__title">ویرایش نقش {{$role->name}}</p>
                <form action="{{route('role-permissions.update',$role->id)}}" method="post" class="padding-30">
                    @csrf
                    @method('patch')
                    <input type="hidden" name="id" value="{{ $role->id }}">
                    <input type="text" name="name" value="{{$role->name}}" placeholder="نام نقش" class="text">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <p class="box__title margin-bottom-15">انتخاب مجوز ها</p>
                    <div class="row">
                        @foreach($permissions as $permission)

                            <div class="col-md-6">


                                <label class="ui-checkbox">
                                    <input value="{{$permission->id}}" id="permission{{$permission->id}}" name="permissions[]"
                                           type="checkbox" @if($role->hasPermissionTo($permission->id)) checked @endif class="sub-checkbox" data-id="{{$permission->id}}">
                                    <span class="checkmark"></span>
                                    <label for="permission{{$permission->id}}"
                                           style="margin-right: 12px; margin-left: 12px">@lang($permission->name)</label>
                                </label>

                            </div>
                        @endforeach
                            @error('permissions')
                            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                            @enderror

                    </div>
                    <button class="btn btn-brand">اضافه کردن</button>
                </form>
            </div>
        </div>
    </div>

@endsection
