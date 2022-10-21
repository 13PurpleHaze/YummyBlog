@extends('layouts.main')
@section('content')
    <section class="about-section">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-between">
                <div class="photo about-me-widget-thumb mw-100">
                    <img src="{{ asset('storage/' . $user->photo) }}" alt="" class="w-100 h-auto">
                </div>
                <div class="info w-75">
                    <p class="pl-2">
                        {!! $user->info !!}
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
