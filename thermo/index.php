<!DOCTYPE html>
<html>
<head>

<title>ThermoMeter</title>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/RGraph.common.core.js"></script>
<script type="text/javascript" src="js/RGraph.common.dynamic.js"></script>
<script type="text/javascript" src="js/RGraph.common.tooltips.js"></script>
<script type="text/javascript" src="js/RGraph.thermometer.js"></script>

</head>
<body>
<canvas id="cvs" width="100" height="400">
    [No canvas support]
</canvas>
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
                     var thermo = [];

                    for (var i in data) {
                        thermo.push(data[i].thermo);
                    }

                     new RGraph.Thermometer({
                    id: 'cvs',
                    min: 0,
                    max: 100,
                    value: thermo,
                    options: {
                    tooltips: ["It's getting hot in here!"],
                    tooltipsEvent: 'mousemove',
                    textAccessible: true
        }
    }).draw();
                });
            }
            setTimeout(showGraph, 1000);
        }
</script>

   


<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.13/js/mdb.min.js"></script>
</body>
</html>
