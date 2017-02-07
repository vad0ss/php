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
<div class="fieldsFilter">
<?php
$switch = 0;
foreach ($extra_fields_content[$j] as $which=>$field) {
if($elems > 0 && ($which+1) > $elems && $switch != 1) {
echo "<div class='filter".$field_id[$j]."_hidden'>";
$switch = 1;
}
echo '<div><input name="array'.$field_id[$j].'[]" type="checkbox" value="'.$field.'" id="'.$field.'"';
foreach ($search as $searchword) {
if ($searchword == $field) echo 'checked="checked"';
}
if($onchange) {
echo " onchange='submit_form_".$module->id."()'";
}
echo ' /><label for="'.$field.'">'.$field.'</label></div>';
}
if($elems > 0 && $switch == 1) echo "</div>";
?>
</div>
<?php if($elems > 0 && count($extra_fields_content[$j]) > $elems) : ?>
<p>
<a href="#" class="button expand expand_filter<?php echo $field_id[$j]; ?>"><?php echo JText::_("MOD_K2_FILTER_MORE"); ?></a>
</p>
<?php endif; ?>
</div>
