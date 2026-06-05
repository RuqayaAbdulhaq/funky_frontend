<header class="header sticky-bar">
    <div class="container">
        <div class="row align-items-start">
            <div class="col-xl-1"></div>
            <div class="col-xl-10 col-lg-12">
                <div class="main-header">
                    <div class="header-logo"><a class="d-flex" href="index.html"><img class="logo-night"
                                alt="Funky Frontend" src="{{ asset('imgs/template/logo.svg') }}"><img
                                class="d-none logo-day" alt="Funky Frontend"
                                src="{{ asset('imgs/template/logo-day.svg') }}"></a></div>
                    <div class="header-nav">
                        <nav class="nav-main-menu d-none d-xl-block">
                            <ul class="main-menu">
                                <x-links />
                            </ul>
                        </nav>
                        <div class="burger-icon burger-icon-white"><span class="burger-icon-top"></span><span
                                class="burger-icon-mid"></span><span class="burger-icon-bottom"></span></div>
                    </div>
                    <div class="header-right text-end"><a class="btn btn-search" href="#"></a>
                        <div class="form-search p-20">
                            <form action="#">
                                <input class="form-control" type="text" placeholder="Search">
                                <input class="btn-search-2" type="submit" value="">
                            </form>
                        </div>
                        <div class="switch-button">
                            <div class="form-check form-switch">
                                <input class="form-check-input" id="flexSwitchCheckChecked" type="checkbox"
                                    role="switch" checked="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>