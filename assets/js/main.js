
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

var active_tab = $(".nav-active").data('active-tab');
console.log(active_tab);
$('.nav-' + active_tab).addClass('active');

$('.settings-nav').on('click', function() {

    var tab = $(this).data('tab');

    $('.settings-nav').removeClass('active');
    $('.nav-' + tab).addClass('active');
    $('.tab-content').removeClass('active');
    $('#' + tab).addClass('active');

  });

  // $(".modal").modal({"backdrop": "static"});

//   $('#submitproduct').click(function(event) {
//     event.preventDefault();
// });

if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}