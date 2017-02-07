<?php
// no direct access
defined('_JEXEC') or die('Restricted access');
$checked = JRequest::getVar('array'.$field_id[$j]);
?>
<script type="text/javascript">
jQuery(document).ready(function() {
//multi select box
jQuery("#K2FilterBox<?php echo $module->id; ?> .k2filter-field-<?php echo $i; ?> select").multiselect({
selectedList: 4,
checkAllText: '<?php echo JText::_("MOD_K2_FILTER_CHECK_ALL_TEXT"); ?>',
uncheckAllText: '<?php echo JText::_("MOD_K2_FILTER_UNCHECK_ALL_TEXT"); ?>',
noneSelectedText: '<?php echo '-- '.JText::_('MOD_K2_FILTER_FIELD_SELECT_DEFAULT').' '.$extra_fields_name[$j].' --'; ?>',
selectedText: '# <?php echo JText::_("MOD_K2_FILTER_MULTIPLE_SELECTED_TEXT"); ?>'
}).multiselectfilter();
});
</script>
<div class="k2filter-field-multi k2filter-field-<?php echo $i; ?>">
<?php if($showtitles) : ?>
<h3>
<?php echo $extra_fields_name[$j]; ?>
</h3>
<?php endif; ?>
<select name="array<?php echo $field_id[$j]; ?>[]" multiple="multiple"<?php if($onchange) : ?> onchange="submit_form_<?php echo $module->id; ?>()"<?php endif; ?>>
<?php if($extra_fields_name[$j] == "Your field name") : ?>
<option <?php if (in_array("Option 1", $checked)) {echo 'selected="selected"';} ?>>Option 1</option>';
<option <?php if (in_array("Option 2", $checked)) {echo 'selected="selected"';} ?>>Option 2</option>';
<option <?php if (in_array("Option 3", $checked)) {echo 'selected="selected"';} ?>>Option 3</option>';
<?php endif; ?>
</select>
</div>
