<?php
// no direct access
defined('_JEXEC') or die('Restricted access');
$search2 = JRequest::getVar('array'.$field_id[$j], null);
$search = array();
(is_array($search2) == false) ?
$search[] = $search2 :
$search = $search2 ;
?>
<script type="text/javascript">
jQuery(document).ready(function () {
<?php if($elems > 0) : ?>
jQuery("div.filter<?php echo $field_id[$j]; ?>_hidden").hide();
jQuery("a.expand_filter<?php echo $field_id[$j]; ?>").click(function() {
jQuery("div.filter<?php echo $field_id[$j]; ?>_hidden").slideToggle("fast");
return false;
});
<?php endif; ?>
});
</script>
<div class="k2filter-field-multi k2filter-field-<?php echo $i; ?>">
<h3>
<?php echo $extra_fields_name[$j]; ?>
</h3>
<div>
<?php
$switch = 0;
foreach ($extra_fields_content[$j] as $which=>$field) {
if($elems > 0 && ($which+1) > $elems && $switch != 1) {
echo "<div class='filter".$field_id[$j]."_hidden'>";
$switch = 1;
}
echo '<input name="array'.$field_id[$j].'[]" type="checkbox" value="'.$field.'" id="'.$field.'"';
foreach ($search as $searchword) {
if ($searchword == $field) echo 'checked="checked"';
}
if($onchange) {
echo " onchange='submit_form_".$module->id."()'";
}
echo ' /><label for="'.$field.'">'.$field.'</label><br />';
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
