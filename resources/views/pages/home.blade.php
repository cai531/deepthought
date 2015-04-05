@extends("master")

@section("header")
    <style>
        header i {
            position: absolute;
            top: -30px;
            left: -30px;
        }
    </style>
@stop

@section("page-icon")
    <i class="mdi-action-home"></i>
@stop

@section("content")
    <section class="home-intro">
        <div class="container clearfix">
            <div class="row">
                <div class="col l6 s12">
                    <h2>Welcome to deepthought</h2>

                    <p>
                        Deepthought is a project that aims to provide <b>interactive</b> and <b>helpful</b> models of
                        <b>data
                            trends</b> collected from the
                        social networking service, <a target="_blank" href="https://twitter.com/">twitter.com</a>, and
                        apply <b>statistical
                            and computational tools</b> in order to gauge
                        how internet users think
                    </p>
                </div>

                <div class="col l6 hide-on-small-only"><img src="img/home-intro.png" class="right home-icon"></div>
            </div>
        </div>
    </section>
    <section class="home-features">
        <div class="container">
            <div class="row">
                <div class="col m4 s12">
                    <i class="mdi-action-search"></i>

                    <h3><b>Search</b> by keyword</h3>

                    <p>View a graph of the frequency of tweets over a certain period of time.</p>
                </div>
                <div class="col m4 s12">
                    <i class="mdi-action-trending-up"></i>

                    <h3>View <b>Trending</b> topics</h3>

                    <p>See the topics that are trending around the world on Twitter.</p>
                </div>
                <div class="col m4 s12">
                    <i class="mdi-action-bug-report"></i>

                    <h3>View <b>Crawler</b> status</h3>

                    <p>See how our crawler is doing. (number of tweets collected, duration, etc.)</p>
                </div>
            </div>
        </div>
    </section>
    <section class="home-rationale">
        <div class="container">
            <h2><b>Why</b> Data Analytics?</h2>

            <p>What's our rationale for doing a data analytics project? Why is this website/tool useful?</p>

            <div class="row">
                <div class="col m4 s12 left-rationale">
                    <div class="reason">
                        <i class="mdi-social-poll"></i>
                        <span>Quantify<br><b>political issues</b></span>
                    </div>
                    <div class="reason">
                        <i class="mdi-maps-local-pharmacy"></i>
                        <span>Detect<br><b>disease outbreak</b></span>
                    </div>
                    <div class="reason">
                        <i class="mdi-maps-local-shipping"></i>
                        <span>Facilitate<br><b>disaster response</b></span>
                    </div>
                </div>
                <div class="col m4 s12"><img class="circle" src="/img/twitter.png"></div>
                <div class="col m4 s12 right-rationale">
                    <div class="reason">
                        <i class="mdi-social-poll"></i>
                        <span>Structure data &<br><b>view trends</b></span>
                    </div>
                    <div class="reason">
                        <i class="mdi-maps-local-pharmacy"></i>
                        <span>detect & monitor<br><b>irregular events</b></span>
                    </div>
                    <div class="reason">
                        <i class="mdi-maps-local-shipping"></i>
                        <span>evaluate<br><b>user relations</b></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section("footer")
    <script>
        $.get("latestcommit.json", dataType = 'json', function (response) {
            var commit = JSON.parse(response);

            var date = commit.days_since_commit;
            var dateDisplay = $('.latestcommit .commit-date');
            switch (date) {
                case 0:
                    dateDisplay.html("Less than a day ago");
                    break;
                case 1:
                    dateDisplay.html("A day ago");
                    break;
                default:
                    dateDisplay.html(date + "days ago");
                    break;
            }

            $('.latestcommit .commit-sha a').html(commit.sha);
            $('.latestcommit .commit-sha a').attr("href", commit.url);
        });
    </script>
@stop