<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Penulis Artikel</title>
    @include('includes.admin.styles')
</head>

<body class="sb-nav-fixed">
    @include('includes.admin.navbarPenulis')
    <div id="layoutSidenav">
        @include('includes.admin.sidebarPenulis')
        <div id="layoutSidenav_content">
            <main>
                @yield('content')
            </main>
            @include('includes.admin.footer')
        </div>
    </div>
    @include('includes.admin.script')
</body>

</html>