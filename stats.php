<!doctype html>
<?php include "get-stats.php"; ?>

<html>
  <head>
    <title>Travel Blog</title>
    <meta name="zhenya" content="travel">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
  </head>

  <body>

    <div class="container">
      <?php include_once("header.php") ?>

      <div id="container-graph" style="min-width: 310px; height: 600px; margin: 0 auto"></div>

    </div>

    <?php
      include_once('footer.php');
    ?>

    <script src="dist/stats/vendor.js"></script>
    <script>
      Highcharts.chart('container-graph', {
        chart: {
          type: 'column'
        },
        title: {
          text: '',
          style: {
            color: '#4E8098',
          }
        },
        subtitle: {
          text: 'Based on user\'s ratings',
          style: {
            color: '#777777',
          }
        },
        xAxis: {
          categories: [
            <? foreach(getCountries() as $country ) echo "'" . $country . "',"; ?>
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
          name: 'Wealth',
          data: [<? foreach(getWealth() as $values ) echo  $values . ","; ?>],
          color: '#4E8098'

        }, {
          name: 'Food',
          data: [<? foreach(getFood() as $values ) echo  $values . ","; ?>],
          color: '#F2E94E'

        }, {
          name: 'Hospitality',
          data: [<? foreach(getHospitality() as $values ) echo  $values . ","; ?>],
          color: '#75485E'

        }, {
          name: 'Safety',
          data: [<? foreach(getSafety() as $values ) echo  $values . ","; ?>],
          color: '#FCB0B3'
        }]
      });

    </script>
  </body>
</html>
