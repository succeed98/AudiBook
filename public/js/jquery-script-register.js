jQuery(function($){
  $('#cel').mask('(99) 99999-9999');
});

function updateColor() {
  var content = $('#color').val();
  $('#Color').css('background-color', content);
}

jQuery(function($) {
	updateColor();
});

$("body").on('input', '#color', function() {
	updateColor();
});

$("body").on('click', '#Color', function() {
  $("#color").val(randomColor());
	updateColor();
});
