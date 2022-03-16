@extends('front.layouts.master')
@section('content')
    <main id="index">
        <article class="container article">
            <div class="ads d-none">
                <a href="" rel="nofollow noopener"><img src="{{asset('front/img/ads/1440px/test.jpg')}}" alt=""></a>
            </div>
            @include('front.layouts.slider')
            @include('front.layouts.new-products')
            @include('front.layouts.most-view-products')
        </article>
       @include('front.layouts.articles')
    </main>
@endsection
