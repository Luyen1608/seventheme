// A $( document ).ready() block.
$(document).ready(function () {
    var isShowChart = false;
    $("#okdDialogCloseBtn1").click(function () {
        $("#popup1").css('display', 'none');
        $("#popup1layout").css('display', 'none');
        isShowChart = false;
        // clearInterval(renderChart);
    });

    $("#bot1").click(function () {
        $("#popup1").css('display', 'block');
        $("#popup1layout").css('display', 'block');
        isShowChart = true;
        var lastDate = 0;
        var data1 = []
        var dataDB = [1,2,3,4,5,6,7,8,9,10];
        var TICKINTERVAL1 = 86400000
        let XAXISRANGE1 = 777600000
        function getDayWiseTimeSeries1(baseval, count, yrange) {
            var i = 0;
            var baseval = new Date() - XAXISRANGE1;
            // baseval.setDate(baseval.getDate() - 9);
            while (i < count) {
                var x = baseval;
                var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;
                var y = dataDB[i];
                data1.push({
                    x, y
                });
                lastDate = baseval
                baseval += TICKINTERVAL1;
                i++;
            }
        }

        getDayWiseTimeSeries1(new Date('11 Feb 2017 GMT').getTime(), 10, {
            min: 10,
            max: 90
        })

        // function getNewSeries1(baseval, yrange) {
        //     var newDate = baseval + TICKINTERVAL1;
        //     lastDate = newDate

        //     for (var i = 0; i < data1.length - 10; i++) {
        //         // IMPORTANT
        //         // we reset the x and y of the data which is out of drawing area
        //         // to prevent memory leaks
        //         data1[i].x = newDate - XAXISRANGE1 - TICKINTERVAL1
        //         data1[i].y = 0
        //     }

        //     data1.push({
        //         x: newDate,
        //         y: Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min
        //     })
        // }

        function resetData() {
            // Alternatively, you can also reset the data at certain intervals to prevent creating a huge series 
            data1 = data1.slice(data1.length - 10, data1.length);
        }

        var optionsBig = {
            series: [{
                data: data1.slice()
                // data:[31, 40, 28, 51, 42, 109, 100,52,32]
            }],
            grid: {
                show: false,
                padding: { left: 0, right: 0, top: -20, bottom: -6 },

                column: {
                    colors: ['#F442336', '#E931E63', '#9C427B0']
                }
            },
            colors: ['#25a750'],
            fill: {
                gradient: {
                    shade: 'light',
                    type: "vertical",
                    shadeIntensity: 0.5,
                    gradientToColors: ['#25a750', '#25a750'],
                    inverseColors: true,
                    opacityFrom: 0.8,
                    opacityTo: 0,
                    stops: [2],
                    colorStops: []
                },
            },
            tooltip: {
                enabled: false,
            },
            chart: {
                background: '#00000000',
                id: 'realtime',
                height: 120,
                type: 'area',
                sparkline: {
                    enabled: false
                },
                animations: {
                    enabled: true,
                    easing: 'linear',
                    dynamicAnimation: {
                        speed: 3000
                    }
                },
                toolbar: {
                    show: false
                },
                zoom: {
                    enabled: false
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                width: 2,
                curve: 'smooth'
            },
            markers: {
                size: 0
            },
            xaxis: {
                type: 'datetime',
                range: XAXISRANGE1,
                labels: {
                    show: true,
                    style: { colors: ['#b0b0b0', '#b0b0b0', '#b0b0b0', '#b0b0b0', '#b0b0b0'] }
                }
            },
            yaxis: {
                stepSize: 25,
                max: 100,
                labels: {
                    show: true,
                    formatter: function (value) {
                        return value + "%";
                    },
                    style: { colors: ['#b0b0b0'] }
                }
            },
            legend: {
                show: false
            },
        };
        var chart1 = new ApexCharts(document.querySelector("#chart11"), optionsBig);
        chart1.render();
        function timeoutChart() {
            getNewSeries1(lastDate, {
                min: 2,
                max: 100
            });

            chart1.updateSeries([{
                data: data1
            }]);
            if (isShowChart == false) {
                clearInterval(renderChart);
            }
        }
        // var renderChart = window.setInterval(timeoutChart, 3000)

    });
});
