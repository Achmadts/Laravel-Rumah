<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">@yield('header')</h1>
        <div class="button">
            @yield('button')
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        @yield('rowAtas')
    </div>
    <!-- Content Row -->

    <div class="row">
        @yield('rowTengah')
    </div>

    <!-- Content Row -->
    <div class="row">
        @yield('rowBawah')
    </div>
</div>
