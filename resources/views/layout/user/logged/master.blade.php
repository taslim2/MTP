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
@include('layout.user.logged._menu')

@yield('content')
@include('sweetalert::alert')
<!-- FOOTER -->
@include('layout.user.logged._footer')
<!-- SCRIPTS -->
@include('layout.user.logged._js')
@yield('jquery')
</body>
</html>
