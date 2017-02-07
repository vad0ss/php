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
<?php
sort($extra_fields_content[$j]);
foreach ($extra_fields_content[$j] as $field) {
echo "<a ";
if(JRequest::getVar('searchword'.$field_id[$j]) == $field) {
echo "style='font-weight: bold;' ";
}
echo "href='#' onClick='document.K2Filter".$module->id.".searchword".$field_id[$j].".value=this.text; submit_form_".$module->id."(); return false;'>".$field."</a>";
echo "<br />";
}
?>
<input name="searchword<?php echo $field_id[$j]; ?>" value="<?php echo JRequest::getVar('searchword'.$field_id[$j]); ?>" type="hidden" />
</div>
