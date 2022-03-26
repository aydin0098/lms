<form action="{{route('role-permissions.store')}}" method="post" class="padding-30">
    @csrf
    <input type="text" name="name" placeholder="نام نقش" class="text">
    <p class="box__title margin-bottom-15">مجوز ها</p>
    <div class="row">
        @foreach($permissions as $permission)

        <div class="col-md-6">


            <label class="ui-checkbox">
                <input value="{{$permission->id}}" id="permission{{$permission->id}}" name="permissions[]"
                       type="checkbox" class="sub-checkbox" data-id="{{$permission->id}}">
                <span class="checkmark"></span>
                <label for="permission{{$permission->id}}"
                       style="margin-right: 12px; margin-left: 12px">@lang($permission->name)</label>
            </label>

        </div>
        @endforeach

    </div>


    <button class="btn btn-brand" style="margin-top: 12px">اضافه کردن</button>
</form>

