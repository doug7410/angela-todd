<nav :class="['navbar', 'navbar-default', 'navbar-fixed-top', {'navbar-shrink' : navShrinkClass}]">
    <div class="container">
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">Angela Todd Photography</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                <li class="dropdown">
                    <a href="#" class="dropbtn">Admin</a>
                    <div class="dropdown-content">
                      <a href="#" @click="currentModal = 'mainImageSlider'">Main image slider</a>
                      <a href="#">Vision</a>
                      <a href="#" @click="currentModal = 'portfolioAdmin'">Portfolio</a>
                      <a href="#">About</a>
                      <a href="#">Contact Info</a>
                      <a href="#">Blog</a>
                      <a href="#" @click.prevent="logout()">Logout</a>
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
                @endif

                <li><a class="page-scroll" href="#banner">Home</a></li>
                <li><a class="page-scroll" href="#vision">Vision</a></li>
                <li><a class="page-scroll" href="#portfolio">Portfolio</a></li>
                <li><a class="page-scroll" href="#about">About</a></li>
                <li><a class="page-scroll" href="#footer">Contact</a></li>
                <li><a href="blog.html">Blog</a></li>
            </ul>
        </div>
    </div>
</nav>
