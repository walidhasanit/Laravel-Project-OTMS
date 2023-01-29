<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OTMS @yield('title')</title>
    <link rel="stylesheet" href="{{asset('/')}}website/css/bootstrap.css">
    <link rel="stylesheet" href="{{asset('/')}}website/css/all.css">
    <link rel="stylesheet" href="{{asset('/')}}website/css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow">
        <div class="container">
            <a href="" class="navbar-brand">OTMS</a>
            <ul class="navbar-nav">
                <li><a href="{{route('home')}}" class="nav-link text-white">Home</a></li>
                <li><a href="{{route('about')}}" class="nav-link text-white">About</a></li>
                <li class="dropdown">
                    <a href="" class="nav-link text-white dropdown-toggle" data-bs-toggle="dropdown">Training Category</a>
                    <ul class="dropdown-menu">
                        @foreach($categories as $category)
                        <li><a href="{{route('training.category', ['id' => $category->id])}}" class="dropdown-item">{{$category->name}}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="{{route('training.all')}}" class="nav-link text-white">All Training</a></li>
                <li><a href="{{route('contact')}}" class="nav-link text-white">Contact</a></li>

                @if(Session::get('student_id'))
                    <li class="dropdown">
                        <a href="" class="nav-link" data-bs-toggle="dropdown">{{Session::get('student_name')}}</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('student.dashboard')}}" class="dropdown-item">My Dashboard</a></li>
                            <li><a href="{{route('student.logout')}}" class="dropdown-item">Logout</a></li>
                        </ul>
                    </li>
                @else
                    <li><a href="{{route('login-registration')}}" class="nav-link text-white">Login/Registration</a></li>
                @endif
            </ul>
        </div>
    </nav>



    @yield('body')


    <footer>
        <section class="py-5 bg-dark">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-body h-100 bg-dark text-white rounded-0 shadow border-0">
                            <h3>OTMS</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex molestias nostrum possimus quae quis. Autem deserunt perspiciatis quae totam. Ab corporis id impedit ipsam minus obcaecati pariatur provident quia, voluptatibus.</p>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card card- h-100 px-3 py-3 bg-dark text-white rounded-0 shadow border-0">
                            <h3>Popular Training</h3>
                            <ul class="navbar-nav">
                                <li><a href="" class="nav-link">PHP With Laravel FrameWork</a></li>
                                <li><a href="" class="nav-link">Mobile App Development</a></li>
                                <li><a href="" class="nav-link">Responsive Web Design</a></li>
                                <li><a href="" class="nav-link">Professional Digital Marketing</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-body h-100 bg-dark text-white rounded-0 shadow border-0">
                            <h3>Contact With Us</h3>
                            <address>
                                House No - 420, Road No - 520, Dhanmondi Dhaka - 1209
                            </address>
                            <ul class="nav">
                                <li><a href="" class="nav-link"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="" class="nav-link"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="" class="nav-link"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="" class="nav-link"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-dark ">
            <div class="container border-top">
                <div class="row">
                    <div class="col-12">
                        <p class="text-center text-white mt-2">copyright@walid_hasan2022</p>
                    </div>
                </div>
            </div>
        </section>
    </footer>
    <script src="{{asset('/')}}website/js/jquery-3.6.1.js"></script>
    <script src="{{asset('/')}}website/js/bootstrap.bundle.js"></script>

    <script>
        $('#email').blur(function () {
            var email = $('#email').val();
            $.ajax({
                type: "GET",
                url: "{{url('/get-student-email-by-email')}}",
                data: {email: email},
                datatype: 'JSON',
                success: function (response) {
                    if(response.id)
                    {
                        $('#emailError').text('Sorry This email already exist. Please enter new email')
                        $('#enrollNowBtn').prop('disabled', true);
                    }
                    else
                    {
                        $('#emailError').text(' ');
                        $('#enrollNowBtn').prop('disabled', false);
                    }
                }
            });
        })
    </script>
</body>
</html>
