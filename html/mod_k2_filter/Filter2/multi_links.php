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
echo "<a href='#' onClick='document.K2Filter".$module->id.".array".$field_id[$j].".value=this.text; submit_form_".$module->id."(); return false;'>".$field."</a>";
echo "<br />";
}
?>
</div>
<input name="array<?php echo $field_id[$j]; ?>[]" type="hidden" value="<?php echo JRequest::getVar("array".$field_id[$j]); ?>" />
</div>
