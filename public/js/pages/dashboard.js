$(function () {
    drawSparklines();
	MorrisArea();
});

function MorrisArea() {
    Morris.Bar({
        element: 'area_chart',
        barGap:0,
        data: [{
                period: '2012',
                Simple: 4,
                Compartida: 4,
                Matrimonial: 3
            }, {
                period: '2013',
                Simple: 5,
                Compartida: 4,
                Matrimonial: 5
            }, {
                period: '2014',
                Simple: 4,
                Compartida: 5,
                Matrimonial: 5
            }, {
                period: '2015',
                Simple: 4.5,
                Compartida: 5,
                Matrimonial: 5
            }, {
                period: '2016',
                Simple: 5,
                Compartida: 3.5,
                Matrimonial: 4
            }, {
                period: '2018',
                Simple: 5,
                Compartida: 5,
                Matrimonial:3
            }, {
                period: '2019',
                Simple: 4,
                Compartida: 5,
                Matrimonial: 4
            }

        ],
        lineColors: ['#d81b60', '#605ca8', 'orange'],
        xkey: 'period',
        ymax: 5,
        ykeys: ['Simple', 'Compartida', 'Matrimonial'],
        labels: ['Simple', 'Compartida', 'Matrimonial'],
        pointSize: 1,
        lineWidth: 0,
        resize: true,
        fillOpacity: 0.5,
        behaveLikeLine: true,
        gridLineColor: '#e0e0e0',
        hideHover: 'auto'
    });
}

function drawSparklines() {
    var sparkline1 = function () {
        $("#sparkline1").sparkline([2, 4, 4, 6, 8, 5, 6, 4, 8, 6, 6, 2], {
            type: 'line',
            width: '100%',
            height: '130',
            lineColor: 'rgba(134, 134, 134, 0.75)',
            fillColor: 'rgba(134, 134, 134, 0.2)',
            maxSpotColor: '#00c292',
            highlightLineColor: 'rgba(0, 0, 0, 0.2)',
            highlightSpotColor: '#00c292'
        });
    }

    var sparkline2 = function () {
        $("#sparkline2").sparkline([2, 4, 4, 6, 8, 5, 6, 4, 8, 6, 6, 2], {
            type: 'line',
            width: '100%',
            height: '130',
            lineColor: '#fb9678',
            fillColor: 'rgba(251, 150, 120, 0.2)',
            maxSpotColor: '#fb9678',
            highlightLineColor: 'rgba(0, 0, 0, 0.2)',
            highlightSpotColor: '#fb9678'
        });
    }

    var sparkline3 = function () {
        $("#sparkline3").sparkline([2, 4, 8, 6, 8, 5, 6, 4, 8, 6, 6, 2], {
            type: 'line',
            width: '100%',
            height: '130',
            lineColor: '#03a9f3',
            fillColor: 'rgba(3, 169, 243, 0.2)',
            minSpotColor: '#03a9f3',
            maxSpotColor: '#03a9f3',
            highlightLineColor: 'rgba(0, 0, 0, 0.2)',
            highlightSpotColor: '#03a9f3'
        });
    }

    var sparkResize;
    $(window).resize(function (e) {
        clearTimeout(sparkResize);
        sparkResize = setTimeout(sparkline1, 100);
        sparkResize = setTimeout(sparkline2, 100);
        sparkResize = setTimeout(sparkline3, 100);
    });

    for (i = 1; i <= 7; i++) {
        $("#sparkline-bar" + i).sparkline([3, 5, 4, 2, 1, 4, 2, 4], {
            type: 'bar'});
    }

    sparkline1();
    sparkline2();
    sparkline3();
}

