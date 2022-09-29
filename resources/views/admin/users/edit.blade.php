@extends('admin.layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">User #{{ $user->id }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Users</a></li>
                        <li class="breadcrumb-item active">User #{{ $user->id }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="card w-50">
            <div class="card-header">
                <h4>Fill in the required fields</h4>
            </div>
            <form action="{{ route('admin.user.update', $user) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                    </div>
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                    </div>
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                    </div>
                    <div class="form-group w-25">
                        <label>Role</label>
                        <select class="custom-select" name="role">
                            @foreach($roles as $key => $value)
                                <option value="{{ $key }}" {{ ($key == $user->role) ? 'selected' : '' }}>{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('role')
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
