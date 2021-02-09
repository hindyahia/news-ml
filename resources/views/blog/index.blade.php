@include('blog.layouts.header')
@include('blog.layouts.topbar')
@include('blog.layouts.navbar')

{{--@include('home.layouts.index')--}}

@yield('content')

    @include('blog.layouts.footer')
