<!DOCTYPE html>
<html>
<head>
    @include('dashboard::include.header')
</head>
<body>
    <section id="container">
    @include('dashboard::include.navbar')
    
    @yield('content')
    @include('dashboard::include.footer')
    </section>
</body>
</html>
