@extends('layouts.app')

@section('content')
    <main>

        <div class="account">
            <form action="{{route('password.update')}}" class="form" method="post">
                @csrf
                <a class="account-logo" href="{{url('/')}}">
                    <img src="{{asset('front/img/weblogo.png')}}" alt="">
                </a>
                <div class="form-content form-account">
                    <input type="hidden" name="token" value="{{ $token }}">
                    <input type="text" name="email" class="txt txt-l @error('email') is-invalid @enderror" value="{{ $email ?? old('email') }}" placeholder="ایمیل">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <input type="text" name="password" class="txt txt-l @error('password') is-invalid @enderror" placeholder="رمز عبور">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <input type="text" name="password_confirmation" class="txt txt-l" placeholder="تکرار رمز عبور">

                    <span class="rules">رمز عبور باید حداقل ۶ کاراکتر و ترکیبی از حروف بزرگ، حروف کوچک، اعداد و کاراکترهای غیر الفبا مانند !@#$%^&*() باشد.</span>
                    <br>
                    <button class="btn continue-btn" type="submit">بازیابی رمز عبور</button>

                </div>
                <div class="form-footer">
                    <a href="{{route('login')}}">صفحه ورود</a>
                </div>
            </form>
        </div>
    </main>
@endsection
