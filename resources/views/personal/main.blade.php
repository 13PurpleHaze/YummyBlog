@extends('personal.layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Home page</h1>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-gradient-red">
                        <div class="inner">
                            <h3>{{ $likesCount }}</h3>

                            <p>Likes</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-heart"></i>
                        </div>
                        <a href="{{ route('personal.like.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-gradient-indigo">
                        <div class="inner">
                            <h3>{{ $commentsCount }}</h3>

                            <p>Comments</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-comment"></i>
                        </div>
                        <a href="{{ route('personal.comment.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
        </div>
    </section>
@endsection
