<?php
// no direct access
defined('_JEXEC') or die('Restricted access');
$from = JRequest::getVar("searchword".$field_id[$j]."-from", 0);
$to = JRequest::getVar("searchword".$field_id[$j]."-to", 0);
?>
<script type="text/javascript">
jQuery(document).ready(function() {
jQuery("div.k2filter-field-<?php echo $i; ?> select").change(function () {
var selected = jQuery("div.k2filter-field-<?php echo $i; ?> select option:selected").text();
var selected = selected.split("-");
var from = selected[0];
var to = selected[1];
jQuery("input[name=searchword<?php echo $field_id[$j];?>-from]").val(from);
jQuery("input[name=searchword<?php echo $field_id[$j];?>-to]").val(to);
<?php if($onchange) : ?>
submit_form_<?php echo $module->id; ?>();
<?php endif; ?>
});
});
</script>
<div class="k2filter-field-select k2filter-field-<?php echo $i; ?>">
<?php if($showtitles) : ?>
<h3>
<?php echo $extra_fields_name[$j]; ?>
</h3>
<?php endif; ?>
<select>
<option value=""><?php echo '-- '.JText::_('MOD_K2_FILTER_FIELD_SELECT_DEFAULT').' '.$extra_fields_name[$j].' --'; ?></option>
<option <?php if ($to == "4") {echo 'selected="selected"';} ?>>0-4</option>';
<option <?php if ($to == "8") {echo 'selected="selected"';} ?>>4-8</option>';
<option <?php if ($to == "12") {echo 'selected="selected"';} ?>>8-12</option>';
<option <?php if ($to == "16") {echo 'selected="selected"';} ?>>12-16</option>';
<option <?php if ($to == "20") {echo 'selected="selected"';} ?>>16-20</option>';
</select>
<input type="hidden" name="searchword<?php echo $field_id[$j];?>-from" value="<?php if($from != 0) echo $from; ?>">
<input type="hidden" name="searchword<?php echo $field_id[$j];?>-to" value="<?php if($to != 0) echo $to; ?>">
</div>
