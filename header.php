<?php
  include_once("country-changes.php");
?>
<div class="container">
  <div class="header clearfix">
    <nav class="navbar navbar-default" role="navigation">
      <div class="container">
        <div class="navbar-header">

          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

        <a class="navbar-brand" href="index.php">Travel Blog</a>

      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

        <ul class="nav navbar-nav">
          <li>
            <a href="index.php">Home</a>
          </li>
          <li>
            <a href="stats.php">Stats</a>
          </li>
        </ul>

      </div>
    </div>
  </nav>
  <h3 class="country-name"><? echo getCountryName(); ?></h3>
</div>
</div>
