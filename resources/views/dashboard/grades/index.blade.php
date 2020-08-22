@extends('layouts.dashboard')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Grades</h1>

<div class="row">

    <div class="col-lg-12">

        <div class="card shadow mb-12">
            <div class="card-header py-3">
                <h6 class="col-md-6 float-left m-0 font-weight-bold text-primary">Grades</h6>
                <div class="col-md-3 float-right">
                    <a href="{{ route('dashboard.grades.export') }}" class="float-right btn btn-success btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                        </span>
                        <span class="text">Export</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>User</td>
                            <td>Exam</td>
                            <td>Grade</td>
                            <td>Taked on</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($resources as $resource)
                        <tr>
                            <td>
                                {{ $counter_offset + $loop->iteration }}.
                            </td>
                            <td>
                                {{ $resource->user->name }}
                            </td>
                            <td>
                                {{ $resource->exam->name }}
                            </td>
                            <td>
                                {{ $resource->grade }}
                            </td>
                            <td>
                                {{ $resource->created_at }}
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
