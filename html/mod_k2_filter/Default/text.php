<?php
// no direct access
defined('_JEXEC') or die('Restricted access');
?>
<div class="k2filter-field-text k2filter-field-<?php echo $i; ?>">
<h3>
<?php echo $extra_fields_name[$j]; ?>
</h3>
<input class="inputbox" name="searchword<?php echo $field_id[$j];?>" type="text" <?php if (JRequest::getVar('searchword').$field_id[$j]) echo ' value="'.JRequest::getVar('searchword'.$field_id[$j]).'"'; ?> />
</div>
