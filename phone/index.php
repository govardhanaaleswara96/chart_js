<!DOCTYPE html>
<html>
<head>

<title>Phone Graph</title>
<style type="text/css">
BODY {
    width: 1000PX;
}

#chart-container {
    width: 100%;
    height: auto;
}
</style>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/Chart.min.js"></script>


</head>
<body>
    <div id="chart-container">
        <canvas id="graphCanvas"></canvas>
    </div>

    <script>
        $(document).ready(function () {
            showGraph();
        });


        function showGraph()
        {
            {
                $.post("data.php",
                function (data)
                {
                    console.log(data);
                     var name = [];
                    var cost = [];

                    for (var i in data) {
                        name.push(data[i].phone_name);
                        cost.push(data[i].price);
                    }

                    var chartdata = {
                        labels: name,
                        datasets: [
                            {
                                label: 'Phone Price',
                                backgroundColor: '#49e2ff',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: cost
                            }
                        ]
                    };

                    var graphTarget = $("#graphCanvas");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata
                    });
                });
            }
            setTimeout(showGraph, 1000);
        }
        </script>

</body>
</html>
