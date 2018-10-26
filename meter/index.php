<!DOCTYPE html>
<html>
<head>

<title>Speed Meter</title>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/RGraph.common.core.js"></script>
<script type="text/javascript" src="js/RGraph.common.dynamic.js"></script>
<script type="text/javascript" src="js/RGraph.meter.js"></script>

</head>
<body>
<canvas id="cvs1" width="600" height="450">[No canvas support]</canvas>
<canvas id="cvs2" width="600" height="450">[No canvas support]</canvas>
<script>
 $(document).ready(function () {
            showGraph();
        });

function showGraph(){
    {
               $.post("data.php",
               function (data)
               {
                console.log(data);
                     var one = [];
                     var two = [];

                    for (var i in data) {
                        one.push(data[i].one);
                        two.push(data[i].two);

                    }

    meter1 = new RGraph.Meter({
        id: 'cvs1',
        min: 0,
        max: 50,
        value: one,
        options: {
            anglesStart: RGraph.PI - 0.55,
            anglesEnd: RGraph.TWOPI + 0.5,
            centery: 290,
            textSize: 12,
            textValign: 'bottom',
            greenStart: 40,
            greenEnd: 50,
            redStart:0,
            redEnd: 30,
            yellowStart: 30,
            yellowEnd: 40,
            greenColor: '#000',
            yellowColor: '#000',
            redColor: '#000',
            segmentRadiusStart: 242,
            border: 0,
            tickmarksSmallNum: 0,
            tickmarksBigNum: 0,
            needleRadius: 50,
            needleColor: '#ddd',
            centerpinStroke: 'white',
            centerpinFill: 'black',
            textAccessible: false,
            unitsPost: 'pc'
        }
    }).on('beforedraw', function (obj)
    {
        RGraph.clear(obj.canvas, 'white');
    }).on('draw', function (obj)
    {
        RGraph.path2(
            obj.context,
            'b a % % % 0 6.2830 false f white',
            obj.centerx,
            obj.centery,
            obj.radius - 50
        );
    }).draw();






    meter2 = new RGraph.Meter({
        id: 'cvs1',
        min: 0,
        max: 100,
        value: two,
        options: {
            radius: meter1.radius - 10,
            backgroundColor: 'rgba(0,0,0,0)',
            anglesStart: RGraph.PI - 0.55,
            anglesEnd: RGraph.TWOPI + 0.5,
            centery: 290,
            textSize: 12,
            textColor: 'black',
            textValign: 'bottom',
            greenColor: 'black',
            yellowColor: 'black',
            redColor: 'black',
            segmentRadiusStart: 234,
            border: 0,
            tickmarksSmallNum: 0,
            tickmarksBigNum: 0,
            needleRadius: 150,
            needleColor: 'gray',
            centerpinStroke: 'gray',
            centerpinFill: 'gray',
            textAccessible: false,
            labelsRadiusOffset:-30,
            unitsPost:'%'
        }
    }).draw();
    
    meter2.canvas.onclick = function (e)
    {
        var value = meter2.getValue(e);
        
        meter2.value = value;
        meter2.grow();
    }


    meter3 = new RGraph.Meter({
        id: 'cvs2',
        min: 0,
        max: 50,
        value: one,
        options: {
            backgroundColor: 'black',
            anglesStart: RGraph.PI - 0.55,
            anglesEnd: RGraph.TWOPI + 0.5,
            centery: 290,
            textSize: 12,
            textColor: 'pink',
            textValign: 'bottom',
            greenStart: 40,
            greenEnd: 50,
            greenColor: '#0a0',
            redStart:0,
            redEnd: 30,
            yellowStart: 30,
            yellowEnd: 40,
            segmentRadiusStart: 235,
            border: 0,
            tickmarksSmallNum: 0,
            tickmarksBigNum: 0,
            needleRadius: 50,
            needleColor: '#ddd',
            centerpinStroke: 'black',
            centerpinFill: '#ddd',
            textAccessible: false,
            adjustable: true
        }
    }).on('beforedraw', function (obj)
    {
        RGraph.clear(obj.canvas, 'black');
    }).on('draw', function (obj)
    {
        RGraph.path2(
            obj.context,
            'b a % % % 0 6.2830 false f black',
            obj.centerx,
            obj.centery,
            obj.radius - 50
        );
    }).draw();

    meter4 = new RGraph.Meter({
        id: 'cvs2',
        min: 0,
        max: 100,
        value: two,
        options: {
            radius: meter1.radius - 50,
            backgroundColor: 'black',
            anglesStart: RGraph.PI - 0.55,
            anglesEnd: RGraph.TWOPI + 0.5,
            centery: 290,
            textSize: 12,
            textColor: 'white',
            textValign: 'bottom',
            greenColor: '#0a0',
            segmentRadiusStart: 193,
            border: 0,
            tickmarksSmallNum: 0,
            tickmarksBigNum: 0,
            needleRadius: 150,
            needleColor: '#ddd',
            centerpinStroke: 'black',
            centerpinFill: '#ddd',
            textAccessible: false,
            adjustable: true
        }
    }).draw();
});

}

setTimeout(showGraph, 1000);
}
</script>
</body>
</html>
