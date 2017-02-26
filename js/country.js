// wrap ready event
$( document ).ready( function(){
  $('#star-display').rating({displayOnly: true, step: 0.5});

  } );

$('#rating').submit(function(e) {

  var url = 'https://script.google.com/macros/s/AKfycbypmiF0cYK_mIh_MQa6_DBLZpx5PqPRClgABq1I9HJ7fXzA3m6X/exec';

  $.ajax({
    type: 'POST',
    url: url,
    data: $('#rating').serialize(), // serializes the form's elements.
    success: function(data)
    {
      $('#submit-rating').hide();
      $('.feedback').show();    }
    });

    e.preventDefault(); // avoid to execute the actual submit of the form.
});
