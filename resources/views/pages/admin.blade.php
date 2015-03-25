@extends("master")

@section("content")
    <div class="crawler-status">
        <ul class="info">
            <h1>General Info</h1>
            <li><b>Duration:</b> <span class="status-duration">-</span></li>
            <li><b>Tweets Collected:</b> <span class="status-tweets-collected">-</span></li>
            <li><b>Currently writing to:</b> <span class="status-fp">-</span></li>
            <li><b>Current file size:</b> <span class="status-file-size">-</span></li>
        </ul>
        <h1 class="sma-graph-title">Graph of SMA against Time/S</h1>
        <div class="sma-graph"></div>
    </div>
@stop

@section("footer")
    <script>
        function updateStatus(response){
            var status = JSON.parse(response);
            $("span.status-duration").html(millisecondsToStr(status.duration*1000));
            $("span.status-tweets-collected").html(commafy(status.total_tweets));
            $("span.status-fp").html(status.file_path);
            $("span.status-file-size").html(bytesToStr(status.file_size));
        }

        var graphLength = 1000;
        var plot = $.plot($(".sma-graph"), [[]]);

        function updateGraph(response) {
            try{
                var json = JSON.parse("[" + response.slice(0, -1) + "]");
            }catch(err){
                console.error(err);
                console.log("AJAX Response: " + response);
            }

            var data = $.makeArray(json);
            plot.setData([data]);
            plot.setupGrid();
            plot.draw();
        }

        setInterval(function(){
            $.get("status.json", updateStatus);
            $.get("sma_graph.txt", updateGraph);
        }, 500);
    </script>
@stop
