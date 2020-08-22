@extends('layouts.web')

@section('nav-links')
<li class="nav-item mx-0 mx-lg-1">
    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#Exams">Exams</a>
</li>
@endsection

@section('content')
<!-- Exams Section-->
<section class="page-section portfolio" id="Exams">
    <div class="container">
        <!-- Exams Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">
            Exams
        </h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon">
                <i class="fas fa-star"></i>
            </div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Exams Grid Items-->
        <div class="row">
            @foreach($exams as $exam)
            <!-- Exams Item 1-->
            <div class="col-md-6 col-lg-4 mb-5">
                <div class="portfolio-item mx-auto exam-modal-trigger" data-toggle="modal" data-target="#examsModal{{ $exam->id }}">
                    <div
                        class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                        <div class="portfolio-item-caption-content text-center text-white">
                            <i class="fas fa-plus fa-3x"></i>
                        </div>
                    </div>
                    <img class="img-fluid" src="{{ asset($exam->video_thumbnail) }}" alt="" />
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            {{ $exams->links() }}
        </div>
    </div>
</section>

@if(auth()->user())
@foreach($exams as $exam)
<!-- Exams Modal 1-->
<div class="portfolio-modal modal fade" id="examsModal{{ $exam->id }}" tabindex="-1" role="dialog"
    aria-labelledby="examsModal{{ $exam->id }}Label" aria-hidden="true" ref="vuemodal{{ $loop->iteration - 1 }}">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="fas fa-times"></i></span>
            </button>
            <div class="modal-body text-center">
                <exam-component :exam="{{ $exam }}" :examvideourl="'{{ $exam->video }}'"></exam-component>
            </div>
        </div>
    </div>
</div>
@endforeach
@endif
@endsection

@section('scripts')
@if(!auth()->user())
<script>
    $(document).ready(function () {
        $('.exam-modal-trigger').click(function () {
            window.location.href = "{{ route('login') }}";
        });
    });
</script>
@endif
@endsection