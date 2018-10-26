<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Live Data Streaming</title>
	<link href="css/examples.css" rel="stylesheet" type="text/css">
	<script language="javascript" type="text/javascript" src="js/jquery.js"></script>
	<script language="javascript" type="text/javascript" src="js/jquery.flot.js"></script>
	<script type="text/javascript">

 $(document).ready(function () {
            showGraph();
		});
		
		function showGraph()
        {
            
                $.post("data.php",
                function (points)
                {
	
					$(function() {
						console.log(points)
						var data = [];
						var totalPoints = [];
						for (var i in points) {
						totalPoints.push(points[i].points);
                    }
					
				

					function getRandomData() {

					if (data.length > 0)
						data = data.slice(1);


					while (data.length < totalPoints) {

					var prev = data.length > 0 ? data[data.length - 1] : 50,
					y = prev + Math.random() * 10 - 5;

					if (y < 0) {
					y = 0;
					} else if (y > 100) {
					y = 100;
						}

				data.push(y);
					}
			var res = [];
			for (var i = 0; i < data.length; ++i) {
				res.push([i, data[i]])
				}

			return res;
			}

		// Set up the control widget

			var updateInterval = 30;
		$("#updateInterval").val(updateInterval).change(function () {
				var v = $(this).val();
				if (v && !isNaN(+v)) {
					updateInterval = +v;
				if (updateInterval < 1) {
					updateInterval = 1;
				} else if (updateInterval > 2000) {
					updateInterval = 2000;
				}
			$(this).val("" + updateInterval);
				}
			});

		var plot = $.plot("#placeholder", [ getRandomData() ], {
			series: {
				shadowSize: 0	// Drawing is faster without shadows
					},
			yaxis: {
				min: 0,
				max: 100
					},
		    xaxis: {
				show: true
			 	}
			});

		function update() {

		plot.setData([getRandomData()]);

		// Since the axes don't change, we don't need to call plot.setupGrid()

		plot.draw();
		setTimeout(update, updateInterval);
	}

		update();

		// Add the Flot version string to the footer

		$("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
		});

                   
                });
            
            setTimeout(showGraph, 3000);
        }
	
	</script>
</head>
<body>

	<div id="header">
		<h2>Live Data Streaming</h2> 
	</div>

	<div id="content">

		<div class="demo-container">
			<div id="placeholder" class="demo-placeholder"></div>
		</div>


		<p>Time<input id="updateInterval" type="text" value="" style="text-align: right; width:5em"> milliseconds</p>

	</div>

</body>
</html>
