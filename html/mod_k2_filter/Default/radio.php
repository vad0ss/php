<?php
// no direct access
defined('_JEXEC') or die('Restricted access');
?>
<script>
jQuery(document).ready(function() {
jQuery('a.uncheck_filter<?php echo $field_id[$j]; ?>').click(function () {
jQuery('input[name=searchword<?php echo $field_id[$j]; ?>]').removeAttr('checked');
<?php if($onchange) : ?>
jQuery("#K2FilterBox<?php echo $module->id; ?> form").submit();
<?php endif; ?>
return false;
});
<?php if($elems > 0) : ?>
jQuery("div.filter<?php echo $field_id[$j]; ?>_hidden").hide();
jQuery("a.expand_filter<?php echo $field_id[$j]; ?>").click(function() {
jQuery("div.filter<?php echo $field_id[$j]; ?>_hidden").slideToggle("fast");
return false;
});
<?php endif; ?>
});
</script>
<div class="k2filter-field-radio k2filter-field-<?php echo $i; ?>">
<h3>
<?php echo $extra_fields_name[$j]; ?>
</h3>
<?php
if(count($extra_fields_content[$j])) {
foreach ($extra_fields_content[$j] as $which=>$field) {
if($elems > 0 && ($which - 1) == $elems) {
echo "<div class='filter".$field_id[$j]."_hidden'>";
$switch = 1;
}
echo '<input name="searchword'.$field_id[$j].'" type="radio" value="'.$field.'" id="'.$field.$module->id.'"';
if (JRequest::getVar('searchword'.$field_id[$j]) == $field) echo ' checked="checked"';
if($onchange) echo ' onchange="submit_form_'.$module->id.'()"';
echo ' /><label for="'.$field.$module->id.'">'.$field.'</label><br />';
}
if($elems > 0) echo "</div>";
}
?>
<div class="K2FilterClear"></div>
<?php if (!$clear_btn) : ?>
<p>
<a href="#" class="button uncheck uncheck_filter<?php echo $field_id[$j]; ?>"><?php echo JText::_("MOD_K2_FILTER_UNCHECK"); ?></a>
</p>
<?php endif; ?>
<?php if($elems > 0 && count($extra_fields_content[$j]) > $elems) : ?>
<p>
<a href="#" class="button expand expand_filter<?php echo $field_id[$j]; ?>"><?php echo JText::_("MOD_K2_FILTER_MORE"); ?></a>
</p>
<?php endif; ?>
</div>
