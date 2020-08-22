@extends('layouts.dashboard')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Create new exam</h1>

<div class="row">

    <div class="col-lg-12">
        <div class="card shadow mb-12">
            <div class="card-body">
            {!! Form::open(['route' => 'exams.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            @csrf
            <div class="form-group">
                <label for="exams-form-name">Exam name</label>
                <input name="name" type="text" class="form-control" id="exams-form-name" required>
                <p class="text-danger">{{ $errors->first('name') }}</p>
            </div>
            <div class="form-group">
                <label for="exams-form-video">Video</label>
                <input name="video" type="file" class="form-control-file" id="exams-form-video" required>
                <small class="form-text text-muted">mp4 videos only</small>
                <p class="text-danger">{{ $errors->first('video') }}</p>
            </div>
            <div class="form-group">
                <label for="exams-form-video_thumbnail">Video thumbnail</label>
                <input name="video_thumbnail" type="file" class="form-control-file" id="exams-form-video_thumbnail" required>
                <p class="text-danger">{{ $errors->first('video_thumbnail') }}</p>
            </div>
            @foreach([0, 1, 2, 3, 4] as $i)
            <div class="form-row">
                <h3>Question {{ $i + 1 }}</h3>
                <div class="form-group col-md-12">
                    <input name="question[{{ $i }}][question]" type="text" class="form-control" id="exams-form-question{{ $i }}" required>
                    <p class="text-danger">{{ $errors->first("question.$i.question") }}</p>
                    <small class="form-text text-muted">Add your answers and select the correct one.</small>
                </div>
                <div class="form-group col-md-4">
                    <label for="exams-form-question{{ $i }}-ans1">
                        <input type="radio" name="question[{{ $i }}][answer]" value="0" checked="checked">
                        Answer 1
                    </label>
                    <input name="question[{{ $i }}][answers][0]" type="text" class="form-control" id="exams-form-question{{ $i }}-ans1" required>
                    <p class="text-danger">{{ $errors->first("question.$i.answers.0") }}</p>
                </div>
                <div class="form-group col-md-4">
                    <label for="exams-form-question{{ $i }}-ans2">
                        <input type="radio" name="question[{{ $i }}][answer]" value="1">
                        Answer 2
                    </label>
                    <input name="question[{{ $i }}][answers][1]" type="text" class="form-control" id="exams-form-question{{ $i }}-ans2" required>
                    <p class="text-danger">{{ $errors->first("question.$i.answers.1") }}</p>
                </div>
                <div class="form-group col-md-4">
                    <label for="exams-form-question{{ $i }}-ans1">
                        <input type="radio" name="question[{{ $i }}][answer]" value="2">
                        Answer 3
                    </label>
                    <input name="question[{{ $i }}][answers][2]" type="text" class="form-control" id="exams-form-question{{ $i }}-ans3" required>
                    <p class="text-danger">{{ $errors->first("question.$i.answers.2") }}</p>
                </div>
            </div>
            @endforeach
            <button type="submit" class="btn btn-primary">Submit</button>
            {!! Form::close() !!}
            </div>
        </div>
    </div>

</div>
@endsection
