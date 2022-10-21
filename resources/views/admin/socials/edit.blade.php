@extends('admin.layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Editing social #{{ $social->id }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.social.index') }}">social</a></li>
                        <li class="breadcrumb-item active">Editing social #{{ $social->id }}</li>
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
            <form action="{{ route('admin.social.update', $social->id) }}" method="post">
                @csrf
                @method('patch')
                <div class="card-body">
                    <div class="form-group">
                        <label>Title</label>
                        <div>
                            <select name="title" class="custom-select w-25">
                                <option value="facebook" {{ $social->title == 'facebook' ? 'selected' : '' }}>Facebook</option>
                                <option value="twitter" {{ $social->title == 'twitter' ? 'selected' : '' }}>Twitter</option>
                                <option value="instagram" {{ $social->title == 'instagram' ? 'selected' : '' }}>Instagram</option>
                                <option value="youtube-play" {{ $social->title == 'youtube' ? 'selected' : '' }}>Youtube</option>
                            </select>
                        </div>
                    </div>
                    @error('title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group w-50">
                        <label for="link">Link</label>
                        <input type="text" name="link" class="form-control" value="{{ $social->link }}">
                    </div>
                    @error('link')
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

