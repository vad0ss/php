<?php
// no direct access
defined('_JEXEC') or die('Restricted access');
?>
<div class="k2filter-field-text-range k2filter-field-<?php echo $i; ?>">
<h3>
<?php echo $extra_fields_name[$j]; ?>
</h3>
<input class="inputbox" style="width: 40%;" name="searchword<?php echo $field_id[$j];?>-from" type="text" <?php if (JRequest::getVar('searchword'.$field_id[$j].'-from')) echo ' value="'.JRequest::getVar('searchword'.$field_id[$j].'-from').'"'; ?> /> -
<input class="inputbox" style="width: 40%;" name="searchword<?php echo $field_id[$j];?>-to" type="text" <?php if (JRequest::getVar('searchword'.$field_id[$j].'-to')) echo ' value="'.JRequest::getVar('searchword'.$field_id[$j].'-to').'"'; ?> />
</div>
