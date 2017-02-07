<?php
// no direct access
defined('_JEXEC') or die('Restricted access');
?>
<link type="text/css" href="modules/mod_k2_filter/assets/js/jquery.ui.slider-rtl.css" rel="stylesheet">
<script type="text/javascript" src="modules/mod_k2_filter/assets/js/jquery.ui.slider-rtl.js"></script>
<script type="text/javascript">
function addCommas(nStr)
{
nStr += '';
x = nStr.split('.');
x1 = x[0];
x2 = x.length > 1 ? '.' + x[1] : '';
var rgx = /(\d+)(\d{3})/;
while (rgx.test(x1)) {
x1 = x1.replace(rgx, '$1' + '.' + '$2');
}
return x1 + x2;
}
<?php
$from = JRequest::getVar("searchword".$field_id[$j]."-from", $extra_fields_content[$j][0]);
$values_count = count($extra_fields_content[$j]) - 1;
$to = JRequest::getVar("searchword".$field_id[$j]."-to", $extra_fields_content[$j][$values_count]);
$value = number_format($to, 0, '', '.'). " - " .number_format($from, 0, '', '.');
?>
jQuery(document).ready(function() {
jQuery("#slider<?php echo $field_id[$j];?>")[0].slide = null;
jQuery("#slider<?php echo $field_id[$j];?>").slider({
range: true,
min: <?php echo $extra_fields_content[$j][0]; ?>,
max: <?php echo $extra_fields_content[$j][$values_count]; ?>,
step: 1,
values: [ <?php echo $from; ?>, <?php echo $to; ?> ],
slide: function(event, ui) {
jQuery( "#amount<?php echo $field_id[$j];?>" ).val( addCommas(ui.values[ 1 ]) + " - " + addCommas(ui.values[ 0 ]) );
jQuery("input#slider<?php echo $field_id[$j];?>_val_from").val( ui.values[ 0 ] );
jQuery("input#slider<?php echo $field_id[$j];?>_val_to").val( ui.values[ 1 ] );
},
stop: function( event, ui ) {
<?php if($onchange) : ?>
submit_form_<?php echo $module->id; ?>()
<?php endif; ?>
<?php if($acounter) : ?>
acounter<?php echo $module->id; ?>();
<?php endif; ?>
},
isRTL: true
});
jQuery("#amount<?php echo $field_id[$j];?>").val("<?php echo $value; ?>");
});
</script>
<div class="k2filter-field-slider k2filter-field-<?php echo $i; ?>">
<h3>
<?php echo $extra_fields_name[$j]; ?>
</h3>
<div class="slider<?php echo $field_id[$j];?>_wrapper">
<input type="text" disabled id="amount<?php echo $field_id[$j];?>" class="k2filter-slider-amount" />
<div id="slider<?php echo $field_id[$j];?>"></div>
<input id="slider<?php echo $field_id[$j];?>_val_from" class="slider_val" type="hidden" name="searchword<?php echo $field_id[$j];?>-from" value="<?php echo $from; ?>">
<input id="slider<?php echo $field_id[$j];?>_val_to" class="slider_val" type="hidden" name="searchword<?php echo $field_id[$j];?>-to" value="<?php echo $to; ?>">
</div>
</div>
