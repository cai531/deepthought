@extends("master")

@section("page-icon")
    <i class="mdi-action-search"></i>
@stop

@section("content")
    <div class="search-results row">
        <h3 class="col s12">Showing search results for <b>{{ $query }}</b></h3>
        <img class="col s1" id="loading" src="{{Request::root()}}/img/loading.gif" alt="loading">
        <div class="col s12 graph"></div>
    </div>
@stop

@section("footer")
    <script src="{{Request::root()}}/js/bin/jquery.flot.min.js"></script>
    <script src="{{Request::root()}}/js/bin/jquery.flot.time.js"></script>
    <script>
        var query = "{{$query}}";
        var opts = {
            series: {
                lines: {lineWidth: 3}
            }
        };
        $(document).ready(function () {
            var $loading = $('#loading').hide();
            $(document)
                    .ajaxStart(function () {
                        $loading.show();
                    })
                    .ajaxStop(function () {
                        $loading.hide();
                    });
            $.ajax({
                url: "{{Request::root()}}/api/search/" + query,
                async: true,
                dataType: 'json',
                success: function (response) {
                    var series = [];
                    $.each(response, function (key, value) {
                        var match = key.match(/(\d+)-(\d+)-(\d+)_(\d+)/);
                        var day = match[1],
                                month = match[2] - 1,
                                year = match[3],
                                hour = match[4];
                        var date = new Date(year, month, day, hour);
                        key = date.getTime() / 1000;
                        series.push([key, value]);
                    });
                    $(".graph").plot([series], opts);
                }
            });


        });
    </script>
@stop