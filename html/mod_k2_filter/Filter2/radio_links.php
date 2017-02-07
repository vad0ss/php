<?php
// no direct access
defined('_JEXEC') or die('Restricted access');
?>
<div class="k2filter-field-radio k2filter-field-<?php echo $i; ?>">
<h3>
<?php echo $extra_fields_name[$j]; ?>
</h3>
<div>
<?php
foreach ($extra_fields_content[$j] as $which=>$field) {
echo "<a href='#'";
if($field == JRequest::getVar('searchword'.$field_id[$j])) {
echo " onClick='document.K2Filter".$module->id.".searchword".$field_id[$j].".value=\"\"; submit_form_".$module->id."(); return false;' class='active' style='font-weight: bold;'";
}
else {
echo " onClick='document.K2Filter".$module->id.".searchword".$field_id[$j].".value=jQuery(this).text(); submit_form_".$module->id."(); return false;'";
}
echo ">".$field."</a>";
echo "<br />";
}
?>
<input name="searchword<?php echo $field_id[$j]; ?>" value="<?php echo JRequest::getVar('searchword'.$field_id[$j]); ?>" type="hidden" />
</div>
</div>
