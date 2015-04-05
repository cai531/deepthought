<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>DeepThought</title>
    <meta name="description"
          content="Deep Thought: A Research Project for event detection and data analysis currently in development">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===== Styles ======-->
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/animate.min.css"/>
    <!--===== Page Specific Styles ======-->
    @yield("header")
</head>
<body>

<!--===== Navbar =====-->
<header>
    <div class="container"><a href="#" data-activates="nav-mobile" class="button-collapse top-nav full"><i
                    class="mdi-navigation-menu"></i></a></div>
    <ul id="nav-mobile" class="side-nav fixed">
        <li class="logo"><a id="logo-container" href="/home" class="brand-logo">deep<br>thought</a></li>
        <li class="{{ Request::is('home*')?'active':'' }}"><a href="/home">Home</a></li>
        <li class="{{ Request::is('search*')?'active':'' }}"><a href="/search">Search</a></li>
        <li class="{{ Request::is('trends*')?'active':'' }}"><a href="/trends">Trends</a></li>
        <li class="{{ Request::is('crawler*')?'active':'' }}"><a href="/crawler">Crawler</a></li>
    </ul>
    @if (Request::path()=="home")
        <div class="home-jumbotron">
            <div class="container">
                <div class="row center"><h1>Welcome</h1></div>

                <div class="row center"><p class="info">A research project for event detection and data analysis</p></div>
                <div class="row center"><a href="/search" class="btn-large waves-effect waves-light start-btn">Get
                        Started</a></div>
                <div class="row center"><p class="version">in dev</p></div>
            </div>
        </div>
        <div class="github-info">
            <div class="container">
                <p class="latestcommit hide-on-small-and-down">
                    Latest Commit on Github:
                <span class="commit-sha">
                    <a class="truncate" target="_blank"></a>
                </span>
                    <span class="commit-date hide-on-med-and-down"></span>
                    <a href="https://github.com/depressedsheep/twitter-deepthought" target="_blank"
                       class="github-link btn-flat right waves-effect waves-light grey-text text-lighten-4 hide-on-small-only">Github</a>
                </p>
            </div>
        </div>
    @else
        <nav class="top-nav">
            @yield("page-icon")
            <div class="container">
                <div class="nav-wrapper">
                    <a class="page-title">{{ Request::path() }}</a>
                </div>
            </div>
        </nav>
    @endif
</header>

<main>
    <!--===== Page Specific Content ======-->
    @yield("content")
</main>

<footer class="page-footer">
    <div class="container">
        <div class="row">
            <div class="col l3 s6">
                <h5 class="white-text"><b>deepthought</b></h5>
                <p class="grey-text text-lighten-4">A research project for event detection and data analysis</p>
            </div>
            <div class="col l3 offset-l1 s6">
                <h5 class="white-text">Connect</h5>
                <ul>
                    <li><a class="btn waves-effect waves-light red lighten-3" href="mailto:kaian531@gmail.com?subject=DeepThought">Email</a></li>
                    <li><iframe src="https://ghbtns.com/github-btn.html?user=depressedsheep&repo=twitter-deepthought&type=star&count=true&size=large" frameborder="0" scrolling="0" width="160px" height="30px"></iframe></li>
                </ul>
            </div>
            <div class="col l4 offset-l1 s12">
                <h5 class="white-text">Development Team</h5>
                <ul>
                    <li class="grey-text text-lighten-3">Kaian - <b>Website</b> and <b>Cralwer</b></li>
                    <li class="grey-text text-lighten-3">Zheng Yang - <b>Crawler</b> and <b>Main Analysis Module</b></li>
                    <li class="grey-text text-lighten-3">Max - <b>Group leader</b> and <b>Design</b></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            &copy 2015 DeepThought
            <a class="grey-text text-lighten-4 right" href="https://github.com/depressedsheep/twitter-deepthought/blob/master/LICENSE">LICENSE</a>
        </div>
    </div>
</footer>

<!--===== Scripts ======-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="js/bin/materialize.min.js"></script>
<script src="js/app.js"></script>
<!--===== Page Specific Scripts ======-->
@yield("footer")
</body>
</html>