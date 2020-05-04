<section class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">

        <div class="navbar-header">
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
            </button>

            <!-- lOGO TEXT HERE -->
            <a href="{{ url('home') }}" class="navbar-brand">MTP</a>
        </div>

        <!-- MENU LINKS -->
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ url('home') }}" class="smoothScroll"><i class="fa fa-h-square" aria-hidden="true"></i>ome</a></li>
                <li><a href="{{ url('available/tests') }}" class="smoothScroll">Available tests</a></li>
                <li><a href="{{ url('logout/aboutus') }}" class="smoothScroll">About Us</a></li>
                <li><a href="{{ url('logout/healthtips') }}" class="smoothScroll">Health tips</a></li>
                <li><a href="{{ url('logout/contractus') }}" class="smoothScroll">Contact</a></li>
                <li><a href="{{ url('login') }}" class="smoothScroll">Login</a></li>
            </ul>
        </div>

    </div>
</section>
