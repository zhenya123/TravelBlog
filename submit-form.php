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
