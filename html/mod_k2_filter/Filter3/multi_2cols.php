<?php
// no direct access
defined('_JEXEC') or die('Restricted access');
$search2 = JRequest::getVar('array'.$field_id[$j], null);
$search = array();
(is_array($search2) == false) ?
$search[] = $search2 :
$search = $search2 ;
?>
<div class="k2filter-field-multi k2filter-field-<?php echo $i; ?>">
<h3>
<?php echo $extra_fields_name[$j]; ?>
</h3>
<div>
<?php
foreach ($extra_fields_content[$j] as $which=>$field) {
echo '<input name="array'.$field_id[$j].'[]" type="checkbox" value="'.$field.'" id="'.$field.'"';
foreach ($search as $searchword) {
if ($searchword == $field) echo 'checked="checked"';
}
echo ' /><label style="display: inline-block; width: 20px;" for="'.$field.'">'.$field.'</label>';
if(($which + 1) % 2 == 0) {
echo "<br />";
}
}
?>
</div>
</div>
