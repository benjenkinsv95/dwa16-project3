<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ben Jenkins - @yield('title')</title>
    <link href="libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="libs/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <link href="images/favicon.png" rel="shortcut icon">
    <link href="/css/master.css" rel="stylesheet">
    @yield('header')
</head>
<body>

<div class="wrapper">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <!--If we are on mobile, show a toggle button with a hamburger icon-->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="http://p1.ben-jenkins.com/">Ben Jenkins</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <!--Tacking in a font-awesome GitHub icon to make it look fancy-->
                    <li><a href="https://github.com/benjenkinsv95/dwa16-project3">GitHub <i id="p1-github-icon"
                                                                                            class="fa fa-github"
                                                                                            aria-hidden="true"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <h1 class="container">@yield('title')</h1>
    <div class="container">
            @yield('content')
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
<script type="text/javascript" src="/js/master.js"></script>

@yield('footer')
</body>
</html>