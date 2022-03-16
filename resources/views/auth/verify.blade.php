@extends('layouts.app')

@section('content')
    <main>
        <div class="account">

            <form action="{{ route('verification.resend') }}" class="form" method="post">
                @csrf
                <a class="account-logo" href="/">
                    <img src="{{asset('front/img/weblogo.png')}}" alt="">
                </a>
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        قبل از ادامه دادن لطفا ایمیل خود را چک کنید و ان را تایید کنید اگر ایمیلی دریافت نکرده اید درخواست مجدد ارسال لینک دهید
                    </div>
                @endif
                <div class="form-content form-account">
                    <button type="submit" class="btn btn-recoverpass">ارسال مجدد لینک فعال سازی</button>
                </div>
                <div class="form-footer">
                    <a href="{{route('login')}}">صفحه ورود</a>
                </div>
            </form>
        </div>
    </main>
@endsection
