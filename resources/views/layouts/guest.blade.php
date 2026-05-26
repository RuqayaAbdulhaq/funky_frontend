@extends('layouts.assets')

@section('header')
    <x-header />
    <x-mobile-header />
@endsection
@section('content')


    <main class="main">
        @yield('main')
    </main>
    <footer class="footer">
        <div class="container">
            <div class="footer-1 bg-gray-850 border-gray-800">
                <div class="footer-bottom border-gray-800">
                    <div class="row">
                        <div class="col-lg-5 text-center text-lg-start">
                            <p class="text-base color-white wow animate__animated animate__fadeIn">© Created by<a
                                    class="copyright" href="https://smartechsol.co/" target="_blank"> Smartechsol</a></p>
                        </div>
                        <div class="col-lg-7 text-center text-lg-end">
                            <div class="box-socials">
                                <div class="d-inline-block mr-30 wow animate__animated animate__fadeIn"
                                    data-wow-delay=".0s"><a class="icon-socials icon-twitter color-gray-500"
                                        href="https://twitter.com">Twitter</a></div>
                                <div class="d-inline-block mr-30 wow animate__animated animate__fadeIn"
                                    data-wow-delay=".2s"><a class="icon-socials icon-linked color-gray-500"
                                        href="https://www.linkedin.com">LinkedIn</a></div>
                                <div class="d-inline-block wow animate__animated animate__fadeIn" data-wow-delay=".4s"><a
                                        class="icon-socials icon-insta color-gray-500"
                                        href="https://www.instagram.com">Instagram</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="progressCounter progressScroll hover-up hover-neon-2">
        <div class="progressScroll-border">
            <div class="progressScroll-circle"><span class="progressScroll-text"><i class="fi-rr-arrow-small-up"></i></span>
            </div>
        </div>
    </div>
@endsection