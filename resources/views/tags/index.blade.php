@extends('layouts.main')
@section('content')

    <!-- ****** Categories Area Start ****** -->
    <section class="categories_area clearfix" id="about">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="tags-area border-0">
                    @foreach($tags as $tag)
                        <a href="{{ route('tag.post.index', $tag) }}">{{ $tag->title }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- ****** Categories Area End ****** -->
@endsection
