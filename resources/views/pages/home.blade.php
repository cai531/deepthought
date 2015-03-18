@extends("master")

@section("header")
    <style>
        body {
            padding: 0;
        }
    </style>
@stop

@section("content")
    <header>
        <div class="intro">
            <img class="logo" src="img/logo.png">

            <p>
                We aim to provide <b>interactive</b> and <b>helpful</b> models of <b>data trends</b> collected from the
                social networking service, <a target="_blank" href="https://twitter.com/">twitter.com</a>, and apply <b>statistical
                    and computational tools</b> in order to gauge
                how internet users think
            </p>
        </div>
        <img src="img/icon.png" class="home-icon animated slideInUp">
    </header>
@stop

@section("footer")

    <script>
        $("nav").addClass("transparent");
        $(window).scroll(function () {
            if ($(document).scrollTop() > 50 && !$('nav').hasClass('mobile-nav')) {
                $('nav').removeClass('transparent');
            } else {
                $('nav').addClass('transparent');
            }
        });
    </script>

@stop

