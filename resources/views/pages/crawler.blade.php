@extends("master")

@section("page-icon")
    <i class="mdi-action-bug-report"></i>
@stop

@section("content")
    <div class="container crawler-status">
        <ul class="row">
            <li class="col m3 s12"><i class="small mdi-action-alarm"></i><span></span></li>
            <li class="col m3 s12"><i class="small mdi-file-file-download"></i><span>-</span></li>
            <li class="col m3 s12"><i class="small mdi-file-folder"></i><span>-</span></li>
            <li class="col m3 s12"><i class="small mdi-editor-insert-drive-file"></i><span>-</span></li>
        </ul>
    </div>
@stop

@section("footer")
    <script>
        $(document).ready(function () {
            function getStatus() {
                $.ajax({
                    type: "GET",
                    url: "api/crawler/status",
                    contentType: "text/json",
                    dataType: "json",
                    success: function(data){

                    },
                    error: function(xhr, status, error){
                        if(xhr.status){
                            console.log("Opps! Crawler is down.");
                        }
                    }
                });
            }

            setInterval(getStatus, 1000);
        });
    </script>
@stop