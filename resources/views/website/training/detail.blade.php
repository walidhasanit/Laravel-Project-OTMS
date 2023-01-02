
@extends('website.master')
@section('title')
    Training Detail Page
@endsection

@section('body')


    {{--section-1 start--}}
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-body shadow border-0 h-100">
                        <img src="{{asset($course->image)}}" class="w-100"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow border-0 h-100">
                        <div class="card-header text-center"><h3>Course details</h3></div>
                        <div class="card-body">
                            <p>{{$course->objective}}</p>
                            <div class="row mb-3">
                                <label class="col-md-3"><h6>Course Name :</h6></label>
                                <div class="col-md-9">
                                    <h6>{{$course->title}}</h6>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3"><h6>Teacher Name: </h6></label>
                                <div class="col-md-9">
                                    <h6>{{$course->teacher->name}}</h6>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3"><h6>Start Date :</h6></label>
                                <div class="col-md-9">
                                    <h6>{{$course->starting_date}}</h6>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-3"><h6>Course Duration :</h6></label>
                                <div class="col-md-9">
                                    <h6>6 months</h6>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3"><h6>Course fee :</h6></label>
                                <div class="col-md-9">
                                    <h6>{{$course->fee}}</h6>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3"></label>
                                <div class="col-md-9">
                                    <a href="{{route('training.enroll', ['id' => $course->id])}}" class="btn btn-info shadow">Enroll Now</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 py-5">
                <div class="card card-body border-0 shadow">
                    <h2>Course Description</h2>
                    <hr/>
                    <p>{!! $course->description !!}}</p>
                </div>
            </div>
        </div>
    </section>
    {{--section-1 end--}}

@endsection
