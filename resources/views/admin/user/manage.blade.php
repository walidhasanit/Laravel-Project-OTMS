@extends('admin.master')


@section('body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">All User Information</h4>
                    <p class="card-title-desc">{{Session::get('message')}}</p>

                    <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Password</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->password}}</td>
{{--                                <td>--}}
{{--                                    <a href="{{route('admin.student-detail', ['id' => $student->id])}}" class="btn btn-success">--}}
{{--                                        <i class="fa fa-book-open"></i>--}}
{{--                                    </a>--}}
{{--                                    <a href="{{route('admin.student-activity', ['id' => $student->id])}}" class="btn btn-info">--}}
{{--                                        <i class="fa fa-arrow-up"></i>--}}
{{--                                    </a>--}}
{{--                                </td>--}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
