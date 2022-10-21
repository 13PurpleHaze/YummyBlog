@extends('admin.layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Socials</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Socials</li>
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
                    <h3>List of socials</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Title</th>
                            <th>Link</th>
                            <th colspan="2" class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($socials as $social)
                            <tr>
                                <td>{{ $social->id }}</td>
                                <td>{{ $social->title }}</td>
                                <td>{{ $social->link }}</td>
                                <td><a href="{{ route('admin.social.edit', $social) }}" class="text-success"><i class="fa fa-solid fa-pen"></i></a></td>
                                <td>
                                    <form action="{{ route('admin.social.destroy', $social) }}" method="post">
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
                    <a href="{{ route('admin.social.create') }}" class="btn btn-dark float-left d-inline-block">Create new</a>
                </div>
            </div>
    </section>
@endsection
