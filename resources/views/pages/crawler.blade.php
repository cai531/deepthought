@extends("master")

@section("page-icon")
    <i class="mdi-action-bug-report"></i>
@stop

@section("content")
    <div class="crawler row">
        <h3 class="col s12">Crawler TPS</h3>
        <img class="col s1" id="loading" src="{{Request::root()}}/img/loading.gif" alt="loading">
        <div class="input-field col s12">
            <select class="select-date">
                <option value="" disabled selected>Select a date</option>
            </select>
        </div>
        <div class="col s12 graph"></div>
    </div>
@stop

@section("footer")
    <script src="{{Request::root()}}/js/bin/jquery.flot.min.js"></script>
    <script src="{{Request::root()}}/js/bin/jquery.flot.time.js"></script>
    <script>
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
                url: "{{Request::root()}}/api/s3/dates",
                dataType: 'json',
                success: function (response) {
                    $.each(response, function (index, ele) {
                        $(".select-date").append($("<option></option>").text(ele).val(ele))
                    });
                    $('.select-date').material_select();
                }
            });

            var opts = {
                series: {
                    lines: {lineWidth: 3}
                }
            };
            $(".select-date").change(function(){
                var date = $(this).val();
                $.ajax({
                    url: "{{Request::root()}}/api/tps/" + date,
                    dataType: 'json',
                    success: function (data) {
                        var series = [];
                        $.each(data, function(key, value){
                            series.push([key, parseInt(value)]);
                        });
                        $(".graph").plot([series], opts);
                    }
                });
            });
        });
    </script>
@stop