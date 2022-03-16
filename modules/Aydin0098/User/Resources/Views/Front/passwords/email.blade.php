@extends('User::Front.layouts.app')

@section('content')
    <main>
        <div class="account">

            <form action="{{route('password.email')}}" class="form" method="post">
                @csrf
                <a class="account-logo" href="/">
                    <img src="{{asset('front/img/weblogo.png')}}" alt="">
                </a>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="form-content form-account">
                    <input type="text" name="email" class="txt-l txt  @error('email') is-invalid @enderror " placeholder="ایمیل">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <br>
                    <button type="submit" class="btn btn-recoverpass">بازیابی</button>
                </div>
                <div class="form-footer">
                    <a href="{{route('login')}}">صفحه ورود</a>
                </div>
            </form>
        </div>
    </main>
@endsection
