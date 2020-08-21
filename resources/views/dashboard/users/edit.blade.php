@extends('layouts.dashboard')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Update user: {{ $resource->name }}</h1>

<div class="row">

    <div class="col-lg-12">

        <div class="card shadow mb-12">
            <div class="card-body">
            {!! Form::open(['route' => ['users.update',$resource->id],'method' => 'PATCH']) !!}
            <input type="hidden" name="resource_id" value="{{ $resource->id }}">
            <div class="form-group">
                <label for="users-form-name">Name</label>
                <input name="name" type="text" class="form-control" id="users-form-name" value="{{ $resource->name }}" required>
                <p class="text-danger">{{ $errors->first('name') }}</p>
            </div>
            <div class="form-group">
                <label for="users-form-email">Email</label>
                <input name="email" type="email" class="form-control" id="users-form-email" value="{{ $resource->email }}" required>
                <p class="text-danger">{{ $errors->first('email') }}</p>
            </div>
            <div class="form-group">
                <label for="users-form-password">Password</label>
                <input name="password" type="password" class="form-control" id="users-form-password">
                <p class="text-danger">{{ $errors->first('password') }}</p>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            {!! Form::close() !!}
            </div>
        </div>
    </div>

</div>
@endsection
