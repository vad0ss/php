<?php
// no direct access
defined('_JEXEC') or die('Restricted access');
?>
<script type="text/javascript">
<?php if($onchange) : ?>
jQuery(document).ready(function() {
jQuery("#slider<?php echo $field_id[$j];?>").bind('mouseup', function() {
jQuery("#K2FilterBox<?php echo $module->id; ?> form").submit();
});
});
<?php endif; ?>
var <?php echo "slider".$field_id[$j]; ?>_values = new Array("",
<?php
echo '"';
echo implode('", "', $extra_fields_content[$j]);
echo '"';
?>
);
jQuery(document).ready(function() {
<?php
if (JRequest::getVar('slider'.$field_id[$j])) {
$values = Array();
$values[0] = "";
$jk = 1;
foreach ($extra_fields_content[$j] as $which=>$field) {
$values[$jk] = $field;
$jk++;
}
for($jk=0; $jk<sizeof($values); $jk++) {
if((JRequest::getVar('slider'.$field_id[$j])) == $values[$jk]) {
echo "jQuery(\"#amount".$field_id[$j]."\").val(slider".$field_id[$j]."_values[".$jk."]);\n";
echo "jQuery(\"#slider".$field_id[$j]."_val\").val(slider".$field_id[$j]."_values[".$jk."]);\n";
}
}
}
?>
jQuery("#slider<?php echo $field_id[$j];?>")[0].slide = null;
jQuery("#slider<?php echo $field_id[$j];?>").slider({
<?php
if (JRequest::getVar('slider'.$field_id[$j])) {
echo "value: ";
$values = Array();
$values[0] = "";
$jk = 1;
foreach ($extra_fields_content[$j] as $which=>$field) {
$values[$jk] = $field;
$jk++;
}
for($jk=0; $jk<sizeof($values); $jk++) {
if((JRequest::getVar('slider'.$field_id[$j])) == $values[$jk]) {
echo $jk;
}
}
echo ",\n";
}
?>
range: "min",
min: 0,
max: <?php echo (sizeof($extra_fields_content[$j])); ?>,
slide: function(event, ui) {
jQuery("#amount<?php echo $field_id[$j];?>").val(<?php echo "slider".$field_id[$j]; ?>_values[ui.value]);
jQuery("#slider<?php echo $field_id[$j];?>_val").val(<?php echo "slider".$field_id[$j]; ?>_values[ui.value]);
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
});
</script>
<div class="k2filter-field-slider k2filter-field-<?php echo $i; ?>">
<h3>
<?php echo $extra_fields_name[$j]; ?>
</h3>
<div class="slider<?php echo $field_id[$j];?>_wrapper">
<input type="text" disabled id="amount<?php echo $field_id[$j];?>" class="k2filter-slider-amount" />
<div id="slider<?php echo $field_id[$j];?>"></div>
<input id="slider<?php echo $field_id[$j];?>_val" class="slider_val" type="hidden" name="slider<?php echo $field_id[$j];?>" value="">
</div>
</div>
