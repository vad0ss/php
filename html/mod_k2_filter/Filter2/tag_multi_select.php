<?php
// no direct access
defined('_JEXEC') or die('Restricted access');
$checked = JRequest::getVar('taga');
?>
<script type="text/javascript">
jQuery(document).ready(function() {
//multi select box
jQuery(".k2filter-field-<?php echo $i; ?> select").multiselect({
selectedList: 4,
checkAllText: '<?php echo JText::_("MOD_K2_FILTER_CHECK_ALL_TEXT"); ?>',
uncheckAllText: '<?php echo JText::_("MOD_K2_FILTER_UNCHECK_ALL_TEXT"); ?>',
noneSelectedText: '<?php echo JText::_('MOD_K2_FILTER_FIELD_TAG_DEFAULT'); ?>',
selectedText: '# <?php echo JText::_("MOD_K2_FILTER_MULTIPLE_SELECTED_TEXT"); ?>'
}).multiselectfilter();
});
</script>
<div class="k2filter-field-tag-multi k2filter-field-<?php echo $i; ?>">
<?php if($showtitles) : ?>
<h3>
<?php echo JText::_('MOD_K2_FILTER_FIELD_TAG'); ?>
</h3>
<?php endif; ?>
<select name="taga[]" multiple="multiple"<?php if($onchange) : ?> onchange="submit_form_<?php echo $module->id; ?>()"<?php endif; ?>>
<?php
if($tags) {
foreach ($tags as $tag) {
$selected = '';
if($checked) {
foreach ($checked as $check) {
if ($check == $tag->tag) $selected = ' selected="selected"';
}
}
echo "<option value='".$tag->tag."'".$selected.">".$tag->tag."</option>";
}
}
?>
</select>
</div>
