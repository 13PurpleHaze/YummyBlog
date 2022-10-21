@extends('layouts.main')
@section('content')

    <!-- ****** Categories Area Start ****** -->
    <section class="categories_area clearfix" id="about">
        <div class="container">
            <div class="row">
                @foreach($categories as $category)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="single_catagory wow fadeInUp" data-wow-delay=".3s">
                            <img src="{{ $category->picture ? asset('/storage/' . $category->picture) : 'none.png'}}" alt="">
                            <div class="catagory-title">
                                <a href="{{ route('category.post.index', $category) }}">
                                    <h5>{{ $category->title }}</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ****** Categories Area End ****** -->
@endsection
