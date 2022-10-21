@extends('layouts.main')
@section('content')
    <section class="about-section">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-between">
                <div class="photo about-me-widget-thumb mw-100">
                    <img src="{{ asset('storage/' . auth()->user()->photo) }}" alt="" class="w-100 h-auto">
                </div>
                <div class="info w-75">
                    <p class="pl-2">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias animi debitis dolor dolores exercitationem illum iste omnis placeat quo, quos reprehenderit velit?
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
