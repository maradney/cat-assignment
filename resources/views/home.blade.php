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
            <!-- Exams Item 1-->
            <div class="col-md-6 col-lg-4 mb-5">
                <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#examsModal1">
                    <div
                        class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                        <div class="portfolio-item-caption-content text-center text-white">
                            <i class="fas fa-plus fa-3x"></i>
                        </div>
                    </div>
                    <img class="img-fluid" src="{{
                                asset(
                                    'web/assets/img/portfolio/cabin.png'
                                )
                            }}" alt="" />
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Exams Modals-->
<!-- Exams Modal 1-->
<div class="portfolio-modal modal fade" id="examsModal1" tabindex="-1" role="dialog"
    aria-labelledby="examsModal1Label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="fas fa-times"></i></span>
            </button>
            <div class="modal-body text-center">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <!-- Exams Modal - Title-->
                            <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0"
                                id="examsModal1Label">
                                Log Cabin
                            </h2>
                            <!-- Icon Divider-->
                            <div class="divider-custom">
                                <div class="divider-custom-line"></div>
                                <div class="divider-custom-icon">
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="divider-custom-line"></div>
                            </div>
                            <!-- Exams Modal - Image-->
                            <video-testing-component class="mb-5" style="min-height: 350px;min-width: 100%;"></video-testing-component>
                            <!-- Exams Modal - Text-->
                            <p class="mb-5">
                                Lorem ipsum dolor sit amet,
                                consectetur adipisicing elit.
                                Mollitia neque assumenda ipsam
                                nihil, molestias magnam, recusandae
                                quos quis inventore quisquam velit
                                asperiores, vitae? Reprehenderit
                                soluta, eos quod consequuntur
                                itaque. Nam.
                            </p>
                            <button class="btn btn-primary" data-dismiss="modal">
                                <i class="fas fa-times fa-fw"></i>
                                Close Window
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
