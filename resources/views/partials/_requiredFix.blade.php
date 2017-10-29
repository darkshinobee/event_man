<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

{{-- <script type="text/javascript">
$("form").submit(function(e) {

var ref = $(this).find("[required]");

$(ref).each(function(){
if ( $(this).val() == '' )
{
alert("Required field should not be blank.");

$(this).focus();

e.preventDefault();
return false;
}
});  return true;
});
</script> --}}
<script type="text/javascript">
// SAFARI REQUIRED CHECK
$(document).ready(function () {
"use strict";
$("form").submit(function(e) {
  var ref = $(this).find("[required]");
  $(ref).each(function(){
    if ( $(this).val() === '' )
    {
      alert("Required field should not be blank.");
      $(this).focus();
      e.preventDefault();
      return false;
    }
  });  return true;
});
});
</script>
