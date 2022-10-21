@extends('admin.layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
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
                    <h3>List of users</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th colspan="3" class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ (\App\Models\User::getRoles())[$user->role] }}</td>
                                <td><a href="{{ route('admin.user.show', $user) }}"><i class="fa fa-eye"></i></a></td>
                                <td><a href="{{ route('admin.user.edit', $user) }}" class="text-success"><i class="fa fa-solid fa-pen"></i></a></td>
                                <td>
                                    <form action="{{ route('admin.user.destroy', $user) }}" method="post">
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
                <div class="card-footer">
                    <a href="{{ route('admin.user.create') }}" class="btn btn-dark d-inline-block float-left">Create new</a>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection

