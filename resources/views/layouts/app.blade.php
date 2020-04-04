<!DOCTYPE html>
<html>

@section('htmlheader')
    @include('layouts.head')
@show

<body>

    @include('layouts.header')

    @yield('content')

    @include('layouts.footer')

    @yield('myscripts')
    
</body>

</html>