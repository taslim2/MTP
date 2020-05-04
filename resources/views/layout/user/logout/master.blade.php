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
@include('layout.user.logout._menu')

@yield('content')

<!-- FOOTER -->
@include('layout.user.logged._footer')
<!-- SCRIPTS -->
@include('layout.user.logged._js')
@include('sweetalert::alert')
</body>
</html>
