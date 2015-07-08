<!doctype html>
<html>
<head>
    <style>
        .graph{width: 10000px; height: 1000px;}
    </style>
</head>
<body>
<div class="graph"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="js/bin/jquery.flot.min.js"></script>
<script src="js/bin/jquery.flot.time.js"></script>
<script>
    $(document).ready(function () {
        var threshold = 1.5;
        var results = [];
        var series_files = ['tps.json', 'ema.json', 'growth.json'];

        $.each(series_files, function (i, file) {
            $.ajax({
                url: file,
                async: false,
                dataType: 'json',
                success: function (response) {
                    var series = []
                    $.each(response, function (timestamp, value) {
                        series.push([(timestamp - 14400) * 1000, value]);
                    })

                    results.push({label: file, data: series});
                }
            })
        });

        var opts = {
            series: {
                lines: {lineWidth: 3}
            },
            grid: {
                markings: [
                    {color: '#ccc', lineWidth: 2, yaxis: {from: threshold, to: threshold}}
                ]
            },
            legend: {
                show: false
            },
            yaxis: {
                min: -1
            },
            xaxis: {
                mode: "time",
                timeformat: "%a, %e %b %I:%M %P",
                minTickSize: [0.5, "hour"]
            }
        };

        $(".graph").plot(results, opts);
    });
</script>
</body>
</html>