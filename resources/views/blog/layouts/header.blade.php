<!DOCTYPE html>
<html lang="ar">

<head>

    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
{{--    <meta name="description" content="{{setting()->site_desc_en}}">--}}
    <meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">


{{--    <title>--}}
{{--        {{setting('site_name_'.app('l'))}}--{{empty($title)? '' : $title }}  </title>--}}
{{--              <meta name="keywords" content="{{setting()->keyword}}">--}}

{{--    <link rel="shortcut icon" href="{{ Storage::url( setting()->icon ) }}">--}}

    @stack('css')
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

    <!-- styles -->
    {{--<link href="/css/app.css" rel="stylesheet">--}}
    <link href="{{url('shop/css/font-awesome.css')}}" rel="stylesheet">


<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

    <link href="{{url('shop/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('shop/css/animate.min.css')}}" rel="stylesheet">
    <link href="{{url('shop/css/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{url('shop/css/owl.theme.css')}}" rel="stylesheet">
{{--    @toastr_css--}}
    @if(app()->getLocale() == 'ar')


        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.css" rel="stylesheet">

    @endif
<!-- theme stylesheet -->
    <link href="{{url('shop/css/style.default.css')}}" rel="stylesheet" id="theme-stylesheet">

    <!-- your stylesheet with modifications -->
    <link href="{{url('shop/css/custom.css')}}" rel="stylesheet">
    <script src="{{url('shop/js/respond.min.js')}}"></script>
    <script src="{{url('shop/js/share-btn.js')}}"></script>

    @if(app()->getLocale() == 'ar')
        <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">


        <link href="{{url('shop/css/rtl.css')}}" rel="stylesheet">
        <style type="text/css">
            #content #blog-listing .post .read-more, #content #blog-homepage .post .read-more {
                text-align: left;
            }

            #content #blog-listing .post .intro, #content #blog-homepage .post .intro {
                text-align: right;
            }

            html, body, h1, h2, h3, h4, h5, h6, label, div, p, span {
                font-family: 'Cairo', sans-serif;
            }
        </style>
    @endif

</head>
