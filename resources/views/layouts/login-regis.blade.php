<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie+edge" />
    <title>Hierba's</title>
    @include('includes.styles')
    @stack('addon-style')
</head>

<body>
    @include('includes.navbar-alter')

    @yield('content')
    @include('includes.footer')

    @include('includes.script')

</body>

</html>