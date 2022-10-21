@extends('personal.layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Editing comment #{{ $comment->id }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('personal.main.index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('personal.comment.index') }}">Comments</a></li>
                        <li class="breadcrumb-item active">Editing comment #{{ $comment->id }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h4>Edit</h4>
            </div>
            <form action="{{ route('personal.comment.update', $comment) }}" method="post">
                @csrf
                @method('patch')
                <div class="card-body">
                    <div class="form-group  w-50">
                        <label for="title">Message</label>
                        <textarea name="message" class="form-control">{{ $comment->message }}</textarea>
                    </div>
                    @error('message')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="card-footer">
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Update">
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

