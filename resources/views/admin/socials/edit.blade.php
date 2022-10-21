@extends('admin.layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Editing post #{{ $post->id }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Posts</a></li>
                        <li class="breadcrumb-item active">Editing post #{{ $post->id }}</li>
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
            <form action="{{ route('admin.post.update', $post->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="card-body">
                    <div class="form-group  w-50">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $post->title }}">
                    </div>
                    @error('title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="title">Content</label>
                        <textarea id="summernote" name="content">{{ $post->content }}</textarea>
                    </div>
                    @error('content')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group w-25">
                        <label>Category</label>
                        <select class="custom-select" name="category_id">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ ($category->id == $post->category_id) ? 'selected' : '' }}>{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group w-50">
                        <label for="exampleInputFile">Add preview</label>
                        <div class="w-25 mb-2">
                            <img src="{{ asset('storage/' . $post->preview_image)}}" alt="" class="w-50">
                        </div>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="preview_image">
                                <label class="custom-file-label">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div>
                    @error('preview_image')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group w-50">
                        <label for="exampleInputFile">Add main image</label>
                        <div class="w-25 mb-2">
                            <img src="{{ asset('storage/' . $post->main_image)}}" alt="" class="w-50">
                        </div>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="main_image">
                                <label class="custom-file-label">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div>
                    @error('main_image')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label>Tags</label>
                        <div class="select2-purple">
                            <select class="select2" multiple="multiple" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;" name="tag_ids[]">
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}" {{ (is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray())) ? 'selected' : '' }}>{{ $tag->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @error('tags')
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

