<?php
// no direct access
defined('_JEXEC') or die('Restricted access');
?>
<style>
#K2FilterBox<?php echo $module->id; ?> .k2filter-field-<?php echo $i; ?> a.active {
font-weight: bold;
}
</style>
<script>
jQuery(document).ready(function() {
var search_az<?php echo $field_id[$j]; ?> = jQuery("input[name=search_az<?php echo $field_id[$j]; ?>]").val().split('');
if(search_az<?php echo $field_id[$j]; ?>.length > 0) {
jQuery("#K2FilterBox<?php echo $module->id; ?> .k2filter-field-<?php echo $i; ?> a.search_az").each(function() {
var link_char = jQuery(this).text();
var link = jQuery(this);
search_az<?php echo $field_id[$j]; ?>.each(function(search_az) {
if(search_az == link_char) {
link.addClass("active");
}
});
});
}
jQuery("#K2FilterBox<?php echo $module->id; ?> .k2filter-field-<?php echo $i; ?> a.search_az").click(function() {
if(jQuery(this).hasClass("active")) {
jQuery("#K2FilterBox<?php echo $module->id; ?> .k2filter-field-<?php echo $i; ?> a.search_az").removeClass("active");
}
else {
jQuery("#K2FilterBox<?php echo $module->id; ?> .k2filter-field-<?php echo $i; ?> a.search_az").removeClass("active");
jQuery(this).addClass("active");
}
var value = '';
jQuery("#K2FilterBox<?php echo $module->id; ?> .k2filter-field-<?php echo $i; ?> a.active").each(function() {
value += jQuery(this).text();
});
jQuery("input[name=search_az<?php echo $field_id[$j]; ?>]").val(value);
<?php if($onchange) : ?>
submit_form_<?php echo $module->id; ?>();
<?php endif; ?>
return false;
});
jQuery("#K2FilterBox<?php echo $module->id; ?> .k2filter-field-<?php echo $i; ?> a.search_az_all").click(function() {
if(jQuery(this).hasClass("activeAll")) {
jQuery("#K2FilterBox<?php echo $module->id; ?> .k2filter-field-<?php echo $i; ?> a.search_az").removeClass("active");
jQuery(this).removeClass("activeAll");
}
else {
jQuery("#K2FilterBox<?php echo $module->id; ?> .k2filter-field-<?php echo $i; ?> a.search_az").addClass("active");
jQuery(this).addClass("activeAll");
}
var value = '';
jQuery("#K2FilterBox<?php echo $module->id; ?> .k2filter-field-<?php echo $i; ?> a.active").each(function() {
value += jQuery(this).text();
});
jQuery("input[name=search_az<?php echo $field_id[$j]; ?>]").val(value);
<?php if($onchange) : ?>
submit_form_<?php echo $module->id; ?>();
<?php endif; ?>
return false;
});
});
</script>
<div class="k2filter-field-text-az k2filter-field-<?php echo $i; ?>">
<?php if($showtitles) : ?>
<h3>
<?php echo $extra_fields_name[$j]; ?>
</h3>
<?php endif; ?>
<a class="search_az_all" href="#" style="font-size: 12px; text-decoration: none;">ALL</a>
<?php foreach(range('A', 'Z') as $letter) : ?>
<a class="search_az" href="#" style="font-size: 12px; text-decoration: none;"><?php echo $letter; ?></a>
<?php endforeach; ?>
<input name="search_az<?php echo $field_id[$j]; ?>" type="hidden" <?php if (JRequest::getVar('search_az'.$field_id[$j])) echo ' value="'.JRequest::getVar('search_az'.$field_id[$j]).'"'; ?> />
</div>
