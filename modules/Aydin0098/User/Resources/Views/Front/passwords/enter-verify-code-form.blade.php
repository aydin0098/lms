@extends('User::Front.layouts.app')

@section('content')
    <main>

        <div class="account act">
            <form action="{{route('password.checkVerifyCode')}}" class="form" method="post">
                @csrf
                <input type="hidden" name="email" value="{{request()->email}}">
                <a class="account-logo" href="/">
                    <img src="{{asset('front/img/weblogo.png')}}" alt="">
                </a>
                <div class="card-header">
                    <p class="activation-code-title">کد فرستاده شده به ایمیل  <span>{{request()->email}}</span>
                        را وارد کنید . ممکن است ایمیل به پوشه spam فرستاده شده باشد
                    </p>
                </div>
                <div class="form-content form-content1">
                    <input name="verify_code" required class="activation-code-input" placeholder="فعال سازی">
                    @error('verify_code')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <br>
                    <button class="btn i-t">تایید</button>

                    <a href="#" onclick="event.preventDefault(); document.getElementById('form-resend').submit()">ارسال مجدد کد فعالسازی</a>

                </div>
                <div class="form-footer">
                    <a href="{{route('register')}}">صفحه ثبت نام</a>
                </div>
            </form>

            <form id="form-resend" action="{{route('verification.resend')}}" method="post">
                @csrf
            </form>

        </div>
    </main>
@endsection
@section('scripts')
    <script src="{{asset('front/js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('front/js/activation-code.js')}}"></script>
@endsection
