<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo')</title>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">



    @yield('js')
    @yield('css')

</head>
<body>

    @yield('nav-menu')

    <div class="container m-7 mt-5">
        @yield('titulo-page')
        <div class="card ">
            <div class="card-body">

                @yield('content')

            </div>
        </div>
    </div>
</body>
</html>
