@extends("master")

@section("content")
    <div class="crawler-status">
        <ul class="info">
            <li><i class="fa fa-clock-o"></i><span class="status-duration">-</span></li>
            <li><i class="fa fa-twitter"></i><span class="status-tweets-collected">-</span></li>
            <li><i class="fa fa-file-archive-o"></i><span class="status-fp">-</span></li>
            <li><i class="fa fa-arrows-alt"></i><span class="status-file-size">-</span></li>
        </ul>
        <div class="graph">
            <h1 class="sma-graph-title">Graph of SMA against Time/S</h1>
            <div class="sma-graph"></div>
        </div>
    </div>
@stop

@section("footer")
    <script>
        function updateStatus(status) {
            $("span.status-duration").html(millisecondsToStr(status.duration * 1000));
            $("span.status-tweets-collected").html(commafy(status.total_tweets));
            $("span.status-fp").html(status.file_path);
            $("span.status-file-size").html(bytesToStr(status.file_size));
        }

        var graphLength = 1000;
        var opts = {
            series: {
                shadowSize: 0,
                color: '#00acc1'
            }
        };
        var plot = $.plot($(".sma-graph"), [[]], opts);

        function updateGraph(response) {
            try {
                var json = JSON.parse("[" + response.slice(0, -1) + "]");
            } catch (err) {
                console.error(err);
                console.log("AJAX Response: " + response);
            }

            var data = $.makeArray(json);
            plot.setData([data]);
            plot.setupGrid();
            plot.draw();
        }

        $.get("sma_graph.txt", updateGraph);
        setInterval(function () {
            $.get("status.json", updateStatus, dataType = 'json');
        }, 500);
        $(window).resize(function(){
            console.log("redrawing graph");
            plot = $.plot($('.sma-graph'), [[]], opts);
            $.get("sma_graph.txt", updateGraph);
        });
    </script>
@stop
