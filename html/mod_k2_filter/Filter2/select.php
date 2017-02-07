<?php
// no direct access
defined('_JEXEC') or die('Restricted access');
?>
<div class="k2filter-field-select k2filter-field-<?php echo $i; ?>">
<?php if($showtitles) : ?>
<h3>
<?php echo $extra_fields_name[$j]; ?>
</h3>
<?php endif; ?>
<select name="searchword<?php echo $field_id[$j]; ?>" <?php if($onchange) : ?>onchange="submit_form_<?php echo $module->id; ?>()"<?php endif; ?>>
<option value=""><?php echo '-- '.JText::_('MOD_K2_FILTER_FIELD_SELECT_DEFAULT').' '.$extra_fields_name[$j].' --'; ?></option>
<?php
foreach ($extra_fields_content[$j] as $field) {
$selected = '';
if (JRequest::getVar('searchword'.$field_id[$j]) == $field) {
$selected = ' selected="selected"';
}
echo '<option value="'.trim($field).'"'.$selected.'>'.$field.'</option>';
}
?>
</select>
</div>
