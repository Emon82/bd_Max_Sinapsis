@extends('backend.app')

@section('title','Dashboard-Home')

@section('content')
    <div class="row">
        <div class="mb-4 col-lg-12 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            {{-- <h5 class="card-title text-primary">Congratulations {{ Auth::user()->name ?? "" }}! 🎉</h5>
                            <p class="mb-4">

                            </p> --}}

                            <h5 class="card-title text-primary">Hello, {{ Auth::user()->name ?? "" }}! 🎉</h5>
                            <p class="mb-4">
                              Hope you are having a nice day!
                            </p>

                            <a href="{{route('profile.setting')}}" class="btn btn-sm btn-outline-primary">View Profile</a>
                        </div>
                    </div>
                    <div class="text-center col-sm-5 text-sm-left">
                        <div class="px-0 pb-0 card-body px-md-4">
                            <img
                                src="{{ asset('backend/img/illustrations/man-with-laptop-light.png') }}"
                                height="140"
                                alt="View Badge User"
                                data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                data-app-light-img="illustrations/man-with-laptop-light.png" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="order-1 col-lg-4 col-md-4">
            <div class="row">
                <div class="mb-4 col-lg-6 col-md-12 col-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="flex-shrink-0 avatar">
                                    <img
                                        src=" {{asset('backend/img/icons/unicons/category.png')}} "
                                        alt="chart success"
                                        class="rounded" />
                                </div>
                                <div class="dropdown">
                                    <button
                                        class="p-0 btn"
                                        type="button"
                                        id="cardOpt3"
                                        data-bs-toggle="dropdown"
                                        aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                        <a class="dropdown-item" href="">View More</a>
                                    </div>
                                </div>
                            </div>
                            <span class="mb-1 fw-medium d-block">Categories</span>
                            <h3 class="mb-2 card-title"></h3>
                        </div>
                    </div>
                </div>
                <div class="mb-4 col-lg-6 col-md-12 col-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="flex-shrink-0 avatar">
                                    <img
                                        src=" {{asset('backend/img/icons/unicons/product2.png')}} "
                                        alt="chart success"
                                        class="rounded" />
                                </div>
                                <div class="dropdown">
                                    <button
                                        class="p-0 btn"
                                        type="button"
                                        id="cardOpt3"
                                        data-bs-toggle="dropdown"
                                        aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                        <a class="dropdown-item" href="">View More</a>
                                    </div>
                                </div>
                            </div>
                            <span class="mb-1 fw-medium d-block">Products</span>
                            <h3 class="mb-2 card-title"></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>

@endsection
