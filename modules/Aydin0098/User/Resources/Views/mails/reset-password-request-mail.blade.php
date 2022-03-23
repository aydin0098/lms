@component('mail::message')
# کد بازیابی رمز حساب شما در سایت دیجی آکادمی

این ایمیل به منظور فعالسازی حساب شما فرستاده شده است . درصورتی که حساب شما فعال شده است این ایمیل را نادیده بگیرید


@component('mail::panel')
    کد فعالسازی : {{$code}}
@endcomponent

با تشکر,<br>
{{ config('app.name') }}
@endcomponent
