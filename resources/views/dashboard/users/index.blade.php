@extends('layouts.dashboard')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Users</h1>

<div class="row">

    <div class="col-lg-12">

        <div class="card shadow mb-12">
            <div class="card-header py-3">
                <h6 class="col-md-6 float-left m-0 font-weight-bold text-primary">Users</h6>
                <div class="col-md-3 float-right">
                    <a href="{{ route('users.create') }}" class="float-right btn btn-success btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                        </span>
                        <span class="text">Add new user</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Name</td>
                            <td>Email</td>
                            <td colspan="2">Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($resources as $resource)
                        <tr>
                            <td>
                                {{ $counter_offset + $loop->iteration }}.
                            </td>
                            <td>
                                {{ $resource->name }}
                            </td>
                            <td>
                                {{ $resource->email }}
                            </td>
                            <td>
                                <a href="{{ route('users.edit', $resource->id) }}" class="btn btn-info btn-circle">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                {{ Form::open(['route' => ['users.destroy' ,$resource->id] ,'method' => 'DELETE' ,'class' => '']) }}
                                <button type="submit" class="btn btn-danger btn-circle">
                                    <i class="fas fa-trash"></i>
                                </button>
                                {{ Form::close() }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer py-3">
                {{ $resources->links() }}
            </div>
        </div>
    </div>

</div>
@endsection
