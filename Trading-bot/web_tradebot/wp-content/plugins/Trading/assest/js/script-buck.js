function executeChart() {
    window.Promise ||
        document.write(
            '<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.min.js"><\/script>'
        )
    window.Promise ||
        document.write(
            '<script src="https://cdn.jsdelivr.net/npm/eligrey-classlist-js-polyfill@1.2.20171210/classList.min.js"><\/script>'
        )
    window.Promise ||
        document.write(
            '<script src="https://cdn.jsdelivr.net/npm/findindex_polyfill_mdn"><\/script>'
        )
    var _seed = 42;
    Math.random = function () {
        _seed = _seed * 16807 % 2147483647;
        return (_seed - 1) / 2147483646;
    };
    var lastDate = 0;
    var data = []
    var TICKINTERVAL = 86400000
    let XAXISRANGE = 777600000

    function getDayWiseTimeSeries(baseval, count, yrange) {
        var i = 0;
        while (i < count) {
            var x = baseval;
            var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;

            data.push({
                x, y
            });
            lastDate = baseval
            baseval += TICKINTERVAL;
            i++;
        }
    }

    

    function getNewSeries(baseval, yrange) {
        var newDate = baseval + TICKINTERVAL;
        lastDate = newDate

        for (var i = 0; i < data.length - 10; i++) {
            data[i].x = newDate - XAXISRANGE - TICKINTERVAL
            data[i].y = 0
        }

        data.push({
            x: newDate,
            y: Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min
        })
    }

    function resetData() {
        data = data.slice(data.length - 10, data.length);
    }

    var options = {
        series: [{
            data: data.slice()
        }],
        grid: {
            show: false,
            padding: { left: -5, right: 0, top: 0, bottom: -15 },

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
            height: 68,
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
            width: 1,
            curve: 'smooth'
        },
        markers: {
            size: 0
        },
        xaxis: {
            type: 'datetime',
            range: XAXISRANGE,
            labels: {
                show: false
            }
        },
        yaxis: {
            max: 100,
            labels: {
                show: false
            }
        },
        legend: {
            show: false
        },
    };

    var charts = document.querySelectorAll(".chart");

    for (var i = 0; i < charts.length; i++) {
        var newData = charts[i].getAttribute('data-chart').split(',')
        getDayWiseTimeSeries(new Date('11 Feb 2017 GMT').getTime(), newData.length, {
            min: 10,
            max: 90
        })

        // Mutate options data
        options.series[0].data = data.map((element, index) => {
            return {x: element.x, y: Number(newData[index])}
        })

        var chart = new ApexCharts(charts[i], options);
        chart.render();

        // window.setInterval(function () {
        //     getNewSeries(lastDate, {
        //         min: 2,
        //         max: 100
        //     })

        //     chart.updateSeries([{
        //         data: data
        //     }])
        // }, 3000);

        // Reset data
        data = [];
    }
}

document.addEventListener("DOMContentLoaded", function () {
    executeChart();
}) 