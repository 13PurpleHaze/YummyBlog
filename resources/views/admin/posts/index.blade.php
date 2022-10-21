@extends('admin.layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Posts</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Posts</li>
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
                    <h3>List of posts</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th colspan="3" class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->category->title }}</td>
                                <td><a href="{{ route('admin.post.show', $post) }}"><i class="fa fa-eye"></i></a></td>
                                <td><a href="{{ route('admin.post.edit', $post) }}" class="text-success"><i class="fa fa-solid fa-pen"></i></a></td>
                                <td>
                                    <form action="{{ route('admin.post.destroy', $post) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="border-0 bg-white"><i class="fa fa-solid fa-trash text-danger"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    <a href="{{ route('admin.post.create') }}" class="btn btn-dark float-left d-inline-block">Create new</a>
                    <div class="float-right">{{ $posts->links() }}</div>
                </div>
        </div>
    </section>
@endsection
