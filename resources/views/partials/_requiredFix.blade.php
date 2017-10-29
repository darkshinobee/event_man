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
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webshim/1.16.0/dev/polyfiller.js"></script>
<script>
webshim.activeLang('en');
webshims.polyfill('forms');
webshims.cfg.no$Switch = true;
</script>
