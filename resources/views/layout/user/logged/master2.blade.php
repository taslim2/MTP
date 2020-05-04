<!DOCTYPE html>
<html lang="en">
<head>

    @extends('layout.user.logged._head')

</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

<!-- PRE LOADER -->
<section class="preloader">
    <div class="spinner">
        <span class="spinner-rotate"></span>
    </div>
</section>

<!-- HEADER -->
<header>
    @include('layout.user.logged._header')
</header>

<!-- MENU -->
<section class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">

        <div class="navbar-header">
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
            </button>

            <!-- lOGO TEXT HERE -->
            <a href="{{ url('#') }}" class="navbar-brand">MTP</a>
        </div>

    </div>
</section>

@yield('content')

<!-- FOOTER -->
@include('layout.user.logged._footer')
<!-- SCRIPTS -->
@include('layout.user.logged._js')
@yield('jquery')
</body>
</html>
