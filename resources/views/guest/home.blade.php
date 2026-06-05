@extends('layouts.guest')

@section('main')
    <x-home.banner />
    <div class="cover-home3">
        <div class="container">
            <div class="row">
                <div class="col-xl-1"></div>
                <div class="col-xl-10 col-lg-12">
                    <x-home.popular-tags />
                    <x-home.featured-articles />
                    <x-home.featured-collections />
                </div>
            </div>
        </div>
    </div>
@endsection