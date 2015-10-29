<input id="reloadValue" type="hidden" name="reloadValue" value="" />
<script type="text/javascript">
$(document).ready(function(){
    // handle back button
    var d = new Date();
    d = d.getTime();
    if (jQuery('#reloadValue').val().length == 0)
    {
        jQuery('#reloadValue').val(d);
        jQuery('body').show();
    }
    else
    {
        jQuery('#reloadValue').val('');
        location.reload();
    }
});
</script>