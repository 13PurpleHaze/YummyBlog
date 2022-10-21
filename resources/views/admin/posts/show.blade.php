@extends('admin.layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Post #{{ $post->id }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Posts</a></li>
                        <li class="breadcrumb-item active">Post #{{ $post->id }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>Post</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <td>ID</td>
                            <td>{{ $post->id }}</td>
                        </tr>
                        <tr>
                            <td>Title</td>
                            <td>{{ $post->title }}</td>
                        </tr>
                        <tr>
                            <td>Content</td>
                            <td>{!! $post->content !!}</td>
                        </tr>
                        <tr>
                            <td>Preview image</td>
                            <td><img src="{{ asset('storage/' . $post->preview_image) }}" alt="" class="w-25"></td>
                        </tr>
                        <tr>
                            <td>Main image</td>
                            <td><img src="{{ asset('storage/' . $post->main_image) }}" alt="" class="w-25"></td>
                        </tr>
                        <tr>
                            <td>Category</td>
                            <td>{{ $post->category->title }}</td>
                        </tr>
                        <tr>
                            <td>Tags</td>
                            <td>
                                @foreach($post->tags as $tag)
                                    {{ $tag->title }}
                                @endforeach
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <a href="{{ route('admin.post.edit', $post) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('admin.post.destroy', $post) }}" method="post" class="d-inline-block">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
