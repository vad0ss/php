<?php
// no direct access
defined('_JEXEC') or die('Restricted access');
?>
<script type="text/javascript">
function addCommas(nStr)
{
nStr += '';
x = nStr.split('.');
x1 = x[0];
x2 = x.length > 1 ? '.' + x[1] : '';
var rgx = /(\d+)(\d{3})/;
while (rgx.test(x1)) {
x1 = x1.replace(rgx, '$1' + ' ' + '$2');
}
return x1 + x2;
}
<?php
$from = JRequest::getVar("searchword".$field_id[$j]."-from", $extra_fields_content[$j][0]);
$values_count = count($extra_fields_content[$j]) - 1;
$to = JRequest::getVar("searchword".$field_id[$j]."-to", $extra_fields_content[$j][$values_count]);
$value = number_format($from, 0, '', ' '). " - " .number_format($to, 0, '', ' ');
?>
jQuery(document).ready(function() {
jQuery("#slider<?php echo $field_id[$j];?>")[0].slide = null;
jQuery("#slider<?php echo $field_id[$j];?>").slider({
range: true,
min: <?php echo $extra_fields_content[$j][0]; ?>,
max: <?php echo $extra_fields_content[$j][$values_count]; ?>,
<?php if($extra_fields_name[$j] == "Цена:") {?>
step: 100000,
<?php }elseif($extra_fields_name[$j] == "Площадь:"){ ?>
step: 5,
<?php }else { ?>
step: 1,
<?php } ?>
values: [ <?php echo $from; ?>, <?php echo $to; ?> ],
slide: function(event, ui) {
jQuery( "#amount<?php echo $field_id[$j];?>" ).val( addCommas(ui.values[ 0 ]) + " - " + addCommas(ui.values[ 1 ]) );
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
}
});
jQuery("#amount<?php echo $field_id[$j];?>").val("<?php echo $value; ?>");
jQuery("#amount<?php echo $field_id[$j];?>").keyup(function() {
var min = parseFloat(jQuery(this).val().replace(/\s|\.|,/g, "").split("-")[0]);
var max = parseFloat(jQuery(this).val().replace(/\s|\.|,/g, "").split("-")[1]);
jQuery("#slider<?php echo $field_id[$j];?>").slider("option", "values", [min, max]);
jQuery("input#slider<?php echo $field_id[$j];?>_val_from").val(min);
jQuery("input#slider<?php echo $field_id[$j];?>_val_to").val(max);
});
});
</script>
<div class="k2filter-field-slider k2filter-field-<?php echo $i; ?>">
<div class="slider<?php echo $field_id[$j];?>_wrapper">
<div>
<div class="labelFilter">
<?php
if ($extra_fields_name[$j] == "Цена:"){
echo "Цена (руб):";
}elseif($extra_fields_name[$j] == "Площадь:"){
echo "Площадь (м2):";
}else {
echo $extra_fields_name[$j];
}
?>
</div>
<input type="text" id="amount<?php echo $field_id[$j];?>" class="k2filter-slider-amount" readonly/>
<div class="clear"></div>
</div>
<div id="slider<?php echo $field_id[$j];?>"></div>
<input id="slider<?php echo $field_id[$j];?>_val_from" class="slider_val" type="hidden" name="searchword<?php echo $field_id[$j];?>-from" value="<?php echo $from; ?>">
<input id="slider<?php echo $field_id[$j];?>_val_to" class="slider_val" type="hidden" name="searchword<?php echo $field_id[$j];?>-to" value="<?php echo $to; ?>">
</div>
</div>
