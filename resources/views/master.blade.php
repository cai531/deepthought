<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>DeepThought</title>
    <meta name="description" content="Deep Thought: A Research Project for event detection and data analysis currently in development">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===== Styles ======-->
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/animate.min.css">
    <link rel="stylesheet" href="/css/normalize.min.css">
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/vendor/modernizr-2.8.3.min.js"></script>
    <!--===== Page Specific Styles ======-->
    @yield("header")
</head>
<body>
<!--===== Navbar ======-->
<nav>
    <a href="#" class="dropdown-toggle"><i class="fa fa-list"></i></a>

    <div class="logo">
        <h1>deepthought</h1>
    </div>
    <ul>
        <li class="{{ Request::is('home*')?'active':'' }}"><a href="/">Home</a></li>
        <li class="{{ Request::is('trends*')?'active':'' }}"><a href="/trends">Trends</a></li>
        <li class="{{ Request::is('search*')?'active':'' }}"><a href="/search">Search</a></li>
        <li class="{{ Request::is('live*')?'active':'' }}"><a href="/live">Live</a></li>
    </ul>
</nav>

<!--===== Page Specific Content======-->
@yield("content")


<!--===== Scripts ======-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="js/vendor/flot/jquery.flot.js"></script>
<script src="js/app.js"></script>
<!--===== Page Specific Scripts ======-->
@yield("footer")
</body>
</html>