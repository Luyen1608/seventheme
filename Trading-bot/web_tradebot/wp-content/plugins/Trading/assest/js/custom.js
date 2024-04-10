function executePopupChart() {
    $("#popup1").css('display', 'block');
    $("#popup1layout").css('display', 'block');
    isShowChart = true;
    var lastDate = 0;
    var data1 = []
    var TICKINTERVAL1 = 86400000
    let XAXISRANGE1 = 777600000
    function getDayWiseTimeSeries1(baseval, count, yrange) {
        var i = 0;
		 var baseval = new Date() - XAXISRANGE1;
        while (i < count) {
            var x = baseval;
            var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;
// 			var y = dataDB[i];
            data1.push({
                x, y
            });
            lastDate = baseval
            baseval += TICKINTERVAL1;
            i++;
        }
    }

    // getDayWiseTimeSeries1(new Date('11 Feb 2017 GMT').getTime(), 10, {
    //     min: 10,
    //     max: 90
    // })

    function getNewSeries1(baseval, yrange) {
        var newDate = baseval + TICKINTERVAL1;
        lastDate = newDate

        for (var i = 0; i < data1.length - 10; i++) {
            // IMPORTANT
            // we reset the x and y of the data which is out of drawing area
            // to prevent memory leaks
            data1[i].x = newDate - XAXISRANGE1 - TICKINTERVAL1
            data1[i].y = 0
        }

        data1.push({
            x: newDate,
            y: Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min
        })
    }

    function resetData() {
        // Alternatively, you can also reset the data at certain intervals to prevent creating a huge series 
        data1 = data1.slice(data1.length - 10, data1.length);
    }

    var optionsBig = {
        series: [{
            data: data1.slice()
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

    var newData = document.querySelector("#chart11").getAttribute('data-chart').split(',')
    getDayWiseTimeSeries1(new Date('11 Feb 2017 GMT').getTime(), newData.length, {
            min: 10,
            max: 90
        })

        optionsBig.series[0].data = data1.map((element, index) => {
        return {x: element.x, y: Number(newData[index])}
    })

    var chart1 = new ApexCharts(document.querySelector("#chart11"), optionsBig);
    chart1.render();

    // function timeoutChart() {
    //     getNewSeries1(lastDate, {
    //         min: 2,
    //         max: 100
    //     });

    //     chart1.updateSeries([{
    //         data: data1
    //     }]);
    //     if (isShowChart == false) {
    //         clearInterval(renderChart);
    //     }
    // }
    // var renderChart = window.setInterval(timeoutChart, 3000);

    data1 = [];


}

function changeTab() {
    document.querySelectorAll('.okui-tabs-pane-segmented').forEach(function (tab) {
        tab.addEventListener('click', function () {
            document.querySelector('.okui-tabs-pane-segmented-active').classList.remove('okui-tabs-pane-segmented-active');
            this.classList.add('okui-tabs-pane-segmented-active');

            var index = Array.from(this.parentNode.children).indexOf(this);
            document.querySelector('.okui-tabs-panel-show').classList.remove('okui-tabs-panel-show');
            document.querySelectorAll('.okui-tabs-panel')[index].classList.add('okui-tabs-panel-show');
        });
    });
}


$(document).ready(function () {
    var isShowChart = false;
    $("#okdDialogCloseBtn1").click(function () {
        $("#popup1").css('display', 'none');
        $("#popup1layout").css('display', 'none');
        isShowChart = false;
        clearInterval(renderChart);
    });

    var x, i, j, l, ll, selElmnt, a, b, c;
    /*look for any elements with the class "custom-select":*/
    x = document.getElementsByClassName("custom-select");
    l = x.length;
    for (i = 0; i < l; i++) {
        selElmnt = x[i].getElementsByTagName("select")[0];
        ll = selElmnt.length;
        /*for each element, create a new DIV that will act as the selected item:*/
        a = document.createElement("DIV");
        a.setAttribute("class", "select-selected");
        a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
        console.log(selElmnt.options[selElmnt.selectedIndex].innerHTML);
        x[i].appendChild(a);
        /*for each element, create a new DIV that will contain the option list:*/
        b = document.createElement("DIV");
        b.setAttribute("class", "select-items select-hide");
        for (j = 1; j < ll; j++) {
            /*for each option in the original select element,
            create a new DIV that will act as an option item:*/
            c = document.createElement("DIV");
            c.innerHTML = selElmnt.options[j].innerHTML;
            c.addEventListener("click", function (e) {
                /*when an item is clicked, update the original select box,
                and the selected item:*/
                var y, i, k, s, h, sl, yl;
                s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                sl = s.length;
                h = this.parentNode.previousSibling;
                for (i = 0; i < sl; i++) {
                    if (s.options[i].innerHTML == this.innerHTML) {
                        s.selectedIndex = i;
                        h.innerHTML = this.innerHTML;
                        y = this.parentNode.getElementsByClassName("same-as-selected");
                        yl = y.length;
                        for (k = 0; k < yl; k++) {
                            y[k].removeAttribute("class");
                        }
                        this.setAttribute("class", "same-as-selected");
                        break;
                    }
                }
                var event = new Event('change');
                s.dispatchEvent(event);
                h.click();
            });
            b.appendChild(c);
        }
        x[i].appendChild(b);
        a.addEventListener("click", function (e) {
            /*when the select box is clicked, close any other select boxes,
            and open/close the current select box:*/
            e.stopPropagation();
            closeAllSelect(this);
            this.nextSibling.classList.toggle("select-hide");
            this.classList.toggle("select-arrow-active");
        });
    }
    function closeAllSelect(elmnt) {
        /*a function that will close all select boxes in the document,
        except the current select box:*/
        var x, y, i, xl, yl, arrNo = [];
        x = document.getElementsByClassName("select-items");
        y = document.getElementsByClassName("select-selected");
        xl = x.length;
        yl = y.length;
        for (i = 0; i < yl; i++) {
            if (elmnt == y[i]) {
                arrNo.push(i)
            } else {
                y[i].classList.remove("select-arrow-active");
            }
        }
        for (i = 0; i < xl; i++) {
            if (arrNo.indexOf(i)) {
                x[i].classList.add("select-hide");
            }
        }
    }
    /*if the user clicks anywhere outside the select box,
    then close all select boxes:*/
    document.addEventListener("click", closeAllSelect);
});
