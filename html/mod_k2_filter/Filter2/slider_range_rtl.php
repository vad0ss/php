<?php
// no direct access
defined('_JEXEC') or die('Restricted access');
?>
<link type="text/css" href="modules/mod_k2_filter/assets/js/jquery.ui.slider-rtl.css" rel="stylesheet">
<script type="text/javascript" src="modules/mod_k2_filter/assets/js/jquery.ui.slider-rtl.js"></script>
<script type="text/javascript">
var <?php echo "slider_range".$field_id[$j]; ?>_values = new Array(
<?php
echo '"';
echo implode('", "', $extra_fields_content[$j]);
echo '"';
?>
);
jQuery(document).ready(function() {
var length = <?php echo (count($extra_fields_content[$j]) - 1); ?>;
<?php
if (JRequest::getVar('slider_range'.$field_id[$j])) {
$vals = explode(" - ", JRequest::getVar('slider_range'.$field_id[$j]));
echo "jQuery(\"#amount".$field_id[$j]."\").val('" . $vals[1] . " - " . $vals[0] . "');\n";
echo "jQuery(\"input#slider_range" . $field_id[$j] . "_val\").val('" . $vals[0] . " - " . $vals[1] . "');\n";
}
else {
echo "jQuery(\"#amount".$field_id[$j]."\").val(slider_range".$field_id[$j]."_values[length] + \" - \" + slider_range".$field_id[$j]."_values[0]);\n";
}
?>
jQuery("#slider_range<?php echo $field_id[$j];?>")[0].slide = null;
jQuery("#slider_range<?php echo $field_id[$j];?>").slider({
<?php
if (JRequest::getVar('slider_range'.$field_id[$j])) {
$vals = explode(" - ", JRequest::getVar('slider_range'.$field_id[$j]));
echo "values: [";
$values = Array();
//$values[0] = "";
//$jk = 1;
$jk = 0;
foreach ($extra_fields_content[$j] as $which=>$field) {
$values[$jk] = $field;
$jk++;
}
for($jj=0; $jj<sizeof($vals); $jj++) {
$vall = "0";
for($jk=0; $jk<sizeof($values); $jk++) {
if(($vals[$jj]) == $values[$jk]) {
$vall = $jk;
}
}
echo $vall;
if($jj+1 < sizeof($vals))
echo ", ";
}
echo "],";
}
else {
echo "values: [ 0, length ],";
}
?>
range: true,
min: 0,
max: <?php echo (sizeof($extra_fields_content[$j]) - 1); ?>,
slide: function(event, ui) {
jQuery("#amount<?php echo $field_id[$j];?>").val(<?php echo "slider_range".$field_id[$j]; ?>_values[ui.values[1]] + " - " + <?php echo "slider_range".$field_id[$j]; ?>_values[ui.values[0]]);
jQuery("input#slider_range<?php echo $field_id[$j];?>_val").val(<?php echo "slider_range".$field_id[$j]; ?>_values[ui.values[0]] + " - " + <?php echo "slider_range".$field_id[$j]; ?>_values[ui.values[1]]);
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
});
</script>
<div class="k2filter-field-slider k2filter-field-<?php echo $i; ?>">
<h3>
<?php echo $extra_fields_name[$j]; ?>
</h3>
<div class="slider_range<?php echo $field_id[$j];?>_wrapper">
<input type="text" disabled id="amount<?php echo $field_id[$j];?>" class="k2filter-slider-amount" />
<div id="slider_range<?php echo $field_id[$j];?>"></div>
<input id="slider_range<?php echo $field_id[$j];?>_val" class="slider_val" type="hidden" name="slider_range<?php echo $field_id[$j];?>" value="">
</div>
</div>
