<!-- Header Start -->
@include('layouts.header')

<!-- Topbar Start -->
@include('layouts.topbar')

<!-- Sidebar Start -->
@include('layouts.sidebar')

<main>
   @yield('content')
</main>

<!-- Footer Start -->
@include('layouts.footer')

<!-- END wrapper -->
@include('layouts.theme')
