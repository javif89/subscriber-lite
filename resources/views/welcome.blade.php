@extends('layouts.app')

@section('content')
<div id="home">
    <div class="container-fluid">
        <div class="hero py-5">
            <div class="row">
                <div class="col-lg-6 verticenter pl-5">
                    <div class="title">People don't want to <br class=""> subscribe to newsletters</div>
                    <div class="subtitle my-3">They want to subscribe to <b class="">YOU</b></div>
                    <p class="lead text-muted mb-3">
                        Manage your subscribers and their information with a lightning fast and easy to use interface.
                    </p>
                    <a href="{{route('register')}}" class="btn cta">Get Started</a>
                </div>
                <div class="col-lg-6">
                    <img src="/img/hero-illustration.png" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
    <div class="features bg-light py-5">
        <div class="container">
            <h1 class="text-center bold mb-5">Features</h1>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <img src="/img/manage-subscribers.png" alt="" class="img-fluid">
                            <div>
                                <h2 class="text-center mb-3">Manage Subscribers</h2>
                                <p class="lead">
                                    Keep track of the people who want to receive your newsletter.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <img src="/img/manage-fields.png" alt="" class="img-fluid">
                            <div>
                                <h2 class="text-center mb-3">Manage Fields</h2>
                                <p class="lead">
                                    House additional information for each of your subscribers.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <img src="/img/filter-and-organize.png" alt="" class="img-fluid">
                            <div>
                                <h2 class="text-center mb-3">Filter and Organize</h2>
                                <p class="lead">
                                    Easily search your subscribers by their name, email or state.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection