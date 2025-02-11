@php
$html_tag_data = ["override" => '{ "attributes" : { "placement" : "vertical", "layout":"boxed", "color" : "light-green"
}}'];
$title = 'Verify Page';
$description = 'Verify Page';
$img_bg = "bg-purple-2.webp";
@endphp
@extends('layout_full', ['title' => $title, 'description' => $description])
@section('css')
@endsection

@section('js_vendor')
<script src="/js/vendor/jquery.validate/jquery.validate.min.js"></script>
<script src="/js/vendor/jquery.validate/additional-methods.min.js"></script>
@endsection

@section('js_page')
<script src="/js/pages/auth.register.js"></script>

@endsection

@section('content_left')

@endsection

@section('content_right')
<div
    class="sw-lg-70 min-h-100 bg-foreground d-flex justify-content-center align-items-center shadow-deep py-5 full-page-content-right-border">
    <div class="sw-lg-50 px-5">
        <div class="sh-11">
            <a href="/">
                <div class="logo-default"></div>
            </a>
        </div> 
        <div class="row justify-content-center">
        <div class="mb-5">
            <div class="card">
                <div class="cta-1 text-primary">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf 
                        <button type="submit" class="btn btn-lg btn-primary">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>

        
        
            
        
    </div>
</div>
@endsection