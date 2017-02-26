Highcharts.chart('container-ca', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Canada',
        style: {
          color: '#4E8098',
        }
    },
    subtitle: {
        text: 'Based on users\' ratings',
        style: {
          color: '#777777',
        }
    },
    xAxis: {
        categories: [
          ''
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Stars'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} stars</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Food',
        data: [5],
        color: '#4E8098'

    }, {
        name: 'Hospitality',
        data: [4],
        color: '#F2E94E'

    }, {
        name: 'Wealth',
        data: [5],
        color: '#75485E'

    }, {
        name: 'Safety',
        data: [5],
        color: '#FCB0B3'

    }]
});
