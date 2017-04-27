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
