<?php
// no direct access
defined('_JEXEC') or die('Restricted access');
?>
<div class="k2filter-field-radio k2filter-field-<?php echo $i; ?>">
<div class="labelFilter">
<?php echo $extra_fields_name[$j]; ?>
</div>
<?php
if(count($extra_fields_content[$j])) {
echo "<div class='fieldsFilter'>";
foreach ($extra_fields_content[$j] as $which=>$field) {
if($elems > 0 && ($which - 1) == $elems) {
echo "<div class='filter".$field_id[$j]."_hidden'>";
$switch = 1;
}
echo '<input name="searchword'.$field_id[$j].'" type="radio" value="'.$field.'" id="'.$field.$module->id.'"';
if (JRequest::getVar('searchword'.$field_id[$j]) == $field) echo ' checked="checked"';
if($onchange) echo ' onchange="submit_form_'.$module->id.'()"';
echo ' /><label for="'.$field.$module->id.'">'.$field.'</label>';
}
if($elems > 0) echo "</div>";
echo "</div>";
}
?>
<div class="K2FilterClear"></div>
<?php if($elems > 0 && count($extra_fields_content[$j]) > $elems) : ?>
<p>
<a href="#" class="button expand expand_filter<?php echo $field_id[$j]; ?>"><?php echo JText::_("MOD_K2_FILTER_MORE"); ?></a>
</p>
<?php endif; ?>
</div>
