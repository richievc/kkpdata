<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="grid simple ">
                <div class="grid-title">
                    <h4> <span class="semi-bold">Accounts</span></h4>
                    <div class="tools">
                        <a href="javascript:;" class="reload"></a>
                    </div>
                </div>

                <div class="grid-body ">

                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <a href="kkpdata/create_account">
                        <button class="btn btn-primary"  style="margin-bottom:20px" id="create_account">Create Account</button>
                    </a>

                    <table class="table" id="example3" >
                        <thead>
                        <tr>
                            <th>Facility</th>
                            <th>Main Telephone</th>
                            <th>Point of Contact</th>
                            <th>POC Phone</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        @if(count($accounts) < 1)
                        <div class="alert alert-danger">No Accounts Found</div>
                        @else

                        @foreach ($accounts as $data)
                        <tr>
                            <td>{{$data->facility}}</td>
                            <td>{{$data->main_phone}}</td>
                            <td>{{($data->is_point_of_contact == 0 ? $data->your_name : $data->point_of_contact_name)}}</td>
                            <td>{{($data->is_point_of_contact == 0 ? $data->your_phone : $data->point_of_contact_phone)}}</td>
                            <td>
                                <a href="{{url('admin/kkpdata/edit/' . $data->id)}}" class="btn btn-xs btn-default">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                        </tbody>
                    </table>

                </div>
                <div class="grid-footer">

                </div>
            </div>
        </div>
    </div>
</div>


























































<!DOCTYPE html>
    <html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
