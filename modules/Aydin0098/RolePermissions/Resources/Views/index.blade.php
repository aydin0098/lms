@extends('Dashboard::master')
@section('breadcrumb')
    <li><a href="{{route('role-permissions.index')}}" title="نقش های کاربری">نقش های کاربری</a></li>
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
    <div class="main-content padding-0 categories">
        <div class="row no-gutters  ">
            <div class="col-8 margin-left-10 margin-bottom-15 border-radius-3">
                <p class="box__title">نقش های کاربری</p>
                <div class="table__box">
                    <table class="table">
                        <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>شناسه</th>
                            <th>نام نقش</th>
                            <th>مجوز ها</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr role="row" class="">
                                <td><a href="">{{$role->id}}</a></td>
                                <td><a href="">{{$role->name}}</a></td>
                                <td>
                                    <ul>
                                        @foreach($role->permissions as $permission)
                                            <li><span class="permissions">@lang($permission->name)</span></li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <a href=""
                                       onclick="event.preventDefault(); deleteItem(event,'{{route('role-permissions.destroy',$role->id)}}')"
                                       class="item-delete mlg-15" title="حذف"></a>
                                    <a href="" target="_blank" class="item-eye mlg-15" title="مشاهده"></a>
                                    <a href="{{route('role-permissions.edit',$role->id)}}" class="item-edit "
                                       title="ویرایش"></a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-4 bg-white">
                <p class="box__title">ایجاد نقش جدید</p>
                @include('RolePermissions::create')
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('back/select2.min.js')}}"></script>
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
    <script>
        $(document).ready(function () {
            $('.select2').select2();
        });
    </script>
@endsection
