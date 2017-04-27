<!doctype html>
<?php
    // include "fetch-rating.php";
    include "country-changes.php";
    // include "js/statsCountry.php";

?>
<html>
  <head>
    <title>Travel Blog</title>
    <meta name="zhenya" content="travel">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/star-rating.css">
  </head>

  <body>
    <?php
      include_once('header.php');
    ?>

  <div class="container">
    <div class="row">
      <?php
        include_once('images.php');
        include_once('descriptions.php');
      ?>

      </div>
      <hr>
    </div>

    <div class="container text-center">
      <h3 class="section-header">Statistics</h3>
      <br>
      <div class="row">
        <div class="col-sm-5">
          <div id="container-graph" style="min-width: 310px; height: 300px; margin: 0 auto"></div>
        </div>
        <?php
          // include_once('graph.php');
          include_once('ratings.php');
        ?>
      </div>
      <hr>
    </div>

    <?php
      include_once('submit-form.php');
      include_once('footer.php');
    ?>

    <script src="dist/country/vendor.js"></script>
    <script src="js/country.js"></script>
    <script>
    Highcharts.chart('container-graph', {
      chart: {
        type: 'column'
      },
      title: {
        text: '<? echo getCountryName(); ?>',
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
        data: [<? echo floatval(getAverageRating('FOOD')); ?>],
        color: '#4E8098'

      }, {
        name: 'Hospitality',
        data: [<? echo floatval(getAverageRating('HOSPITALITY')); ?>],
        color: '#F2E94E'

      }, {
        name: 'Wealth',
        data: [<? echo floatval(getAverageRating('WEALTH')); ?>],
        color: '#75485E'

      }, {
        name: 'Safety',
        data: [<? echo floatval(getAverageRating('SAFETY')); ?>],
        color: '#FCB0B3'

      }]
    });
    </script>
  </body>

</html>
