<!DOCTYPE html>
<html>

@section('htmlheader')
    @include('layouts.head')
@show

<body >
    <header></header>
     
    @yield('content')

    <!-- FOOTER -->
    <!-- <footer class="text-center">
        <div class="container">
            2020, Intelli, todos los derechos reservados
        </div>
    </footer> -->
    
    @yield('myscripts')
    
</body>

</html>