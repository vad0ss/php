<?php
// no direct access
defined('_JEXEC') or die('Restricted access');
?>
<div class="k2filter-field-select k2filter-field-<?php echo $i; ?>">
<?php if($showtitles) : ?>
<div class="labelFilter">
<?php echo $extra_fields_name[$j]; ?>
</div>
<?php endif; ?>
<select name="searchword<?php echo $field_id[$j]; ?>" <?php if($onchange) : ?>onchange="submit_form_<?php echo $module->id; ?>()"<?php endif; ?>>
<option value=""><?php echo '--'; ?></option>
<?php
if($values) {
foreach ($values as $value) {
echo '<option ';
if (JRequest::getVar('searchword'.$field_id[$j]) == $value) {echo 'selected="selected"';}
echo '>'.$value.'</option>';
}
}
?>
</select>
</div>
