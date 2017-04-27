<?php
  include_once("country-changes.php");
?>

<div class="col-sm-8">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">

    <ol class="carousel-indicators hidden-xs">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="<? echo getImage(1) ?>" alt="Image">
        <div class="carousel-caption">
          <h3><? echo getCaption(1); ?></h3>
          <p><? echo getCaption(2); ?></p>
        </div>
      </div>

      <div class="item">
        <img src="<? echo getImage(2) ?>" alt="Image">
        <div class="carousel-caption">
          <h3><? echo getCaption(3); ?></h3>
          <p><? echo getCaption(4); ?></p>
        </div>
      </div>

      <div class="item">
        <img src="<? echo getImage(3) ?>" alt="Image">
        <div class="carousel-caption">
          <h3><? echo getCaption(5); ?></h3>
          <p><? echo getCaption(6); ?></p>
        </div>
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>

    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
