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
        <div class="col-sm-3">
          <div class="well">
            <h4>Food</h4>
            <input id="star-display" value="<? echo floatval(getAverageRating('FOOD')); ?>" class="rating" data-size="xs" readonly="true" data-show-clear="false" data-show-caption="false">
          </div>
          <div class="well">
            <h4>Wealth</h4>
            <input id="star-display" value="<? echo floatval(getAverageRating('WEALTH')); ?>" class="rating" data-size="xs" readonly="true" data-show-clear="false" data-show-caption="false">
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>Hospitality</h4>
            <input id="star-display" value="<? echo floatval(getAverageRating('HOSPITALITY')); ?>" class="rating" data-size="xs" readonly="true" data-show-clear="false" data-show-caption="false">
          </div>
          <div class="well">
            <h4>Safety</h4>
            <input id="star-display" value="<? echo floatval(getAverageRating('SAFETY')); ?>" class="rating" data-size="xs" readonly="true" data-show-clear="false" data-show-caption="false">
          </div>
        </div>

      </div>
      <hr>
    </div>
    <form id="rating" class="container" method="post">
      <h3 class="section-header">Rate your trip to <? echo getCountryName(); ?></h3>
      <br>
      <div>
        <label class="rating-label">Rate Food</label>
        <div class="col-10">
          <input id="star-display" name="food" class="rating" data-size="xs" data-show-clear="false" data-show-caption="false">
        </div>
        <label class="rating-label">Rate Hospitality</label>
        <div class="col-10">
          <input id="star-display" name="hospitality" class="rating" data-size="xs" data-show-clear="false" data-show-caption="false">
        </div>
        <label class="rating-label">Rate Wealth</label>
        <div class="col-10">
          <input id="star-display" name="wealth" class="rating" data-size="xs" data-show-clear="false" data-show-caption="false">
        </div>
        <label class="rating-label">Rate Safety</label>
        <div class="col-10">
          <input id="star-display" name="safety" class="rating" data-size="xs" data-show-clear="false" data-show-caption="false">
        </div>
        <input name="code" hidden="true" value="<? echo getCountryCode(); ?>">
        <br>
        <button type="submit" name="submit" id="submit-rating" class="btn btn-default btn-lg" <?php if($showMessage) {?> style="display: none;" <?php } ?>>Submit</button>
        <p class="feedback" <?php if(!$showMessage) {?> hidden="true" <?php } ?>>Thanks! The rating was updated based on your feedback!</p>
      </div>
      <hr>
    </form>
    <?php
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
