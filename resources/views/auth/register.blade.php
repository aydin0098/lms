@extends('layouts.app')
@section('title','ثبت نام')

@section('content')
    <main>

        <div class="account">
            <form action="{{route('register')}}" class="form" method="post">
                @csrf
                <a class="account-logo" href="{{url('/')}}">
                    <img src="{{asset('front/img/weblogo.png')}}" alt="">
                </a>
                <div class="form-content form-account">
                    <input type="text" name="name" class="txt @error('name') is-invalid @enderror"
                           placeholder="نام و نام خانوادگی">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <input type="text" name="email" class="txt txt-l @error('email') is-invalid @enderror" placeholder="ایمیل">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <input type="text" name="mobile" class="txt txt-l @error('mobile') is-invalid @enderror" placeholder="شماره موبایل">
                    @error('mobile')
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
                    <button class="btn continue-btn" type="submit">ثبت نام و ادامه</button>

                </div>
                <div class="form-footer">
                    <a href="login.html">صفحه ورود</a>
                </div>
            </form>
        </div>
    </main>
@endsection
