<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CBIEV-iSpark</title>

        <!-- Fonts -->
        {{-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet"> --}}

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body>
        <div class="custom-container">
            <div class="main-box">
                <div class="logo-box">
                    <div class="taruc-logo">
                        <a href="https://www.tarc.edu.my/" target="_blank">
                            <img src="/storage/images/logo/taruc.png">
                        </a>
                    </div>
                    <div class="cbiev-logo">
                        <a href="https://www.tarc.edu.my/cbiev/" target="_blank">
                            <img src="/storage/images/logo/cbiev.png">
                        </a>
                    </div>
                    <div class="ispark-logo">
                        <a href="#" target="_blank">
                            <img src="/storage/images/logo/ispark.png">
                        </a>
                    </div>
                </div>
                <div class="title-box">
                    <h2><b>CBIEV Web Portal</b></h2>
                </div>
                <div class="login-box">
                    <h5>Member Login</h5>
                    <ul>
                        <li>
                            <a class="button-one" href="{{route('project.registration.login')}}" target="_blank">Project Login</a>
                        </li>
                        <li>
                            <a class="button-one" href="{{route('mentor.temp.registration.login')}}" target="_blank">Investor/Mentor</a>
                        </li>
                        <li>
                            <a class="button-one" href="{{route('staff.login')}}" target="_blank">Staff</a>
                        </li>
                    </ul>
                </div>
                <div class="application-box">
                    <h5>New Application</h5>
                    <ul>
                        <li>
                            <a class="button-one" href="{{route('project.registration.show')}}" target="_blank">iSpark Project</a>
                        </li>
                        <li>
                            <a class="button-one" href="{{route('investor.registration.show')}}" target="_blank">iSpark Investor</a>
                        </li>
                        <li>
                            <a class="button-one" href="{{route('mentor.registration.show')}}" target="_blank">iSpark Mentor</a>
                        </li>
                        <li>
                        {{-- <li>
                            <a class="button-one" href="{{route('staff.login')}}" target="_blank">Co-Working Space</a>
                        </li>
                        </li> --}}
                    </ul>
                </div>
                <div class="disclaimer-box">
                    @include('components.disclaimer')
                </div>
            </div>
        </div>
    </body>
</html>
