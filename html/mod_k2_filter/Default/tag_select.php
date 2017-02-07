<?php
// no direct access
defined('_JEXEC') or die('Restricted access');
?>
<div class="k2filter-field-tag-select k2filter-field-<?php echo $i; ?>">
<?php if($showtitles) : ?>
<h3>
<?php echo JText::_('MOD_K2_FILTER_FIELD_TAG'); ?>
</h3>
<?php endif; ?>
<select name="ftag" <?php if($onchange) : ?>onchange="submit_form_<?php echo $module->id; ?>()"<?php endif; ?>>
<option value=""><?php echo JText::_('MOD_K2_FILTER_FIELD_TAG_DEFAULT'); ?></option>
<?php
foreach ($tags as $tag) {
echo '<option ';
if (JRequest::getVar('ftag') == $tag->tag) { echo 'selected="selected"'; }
echo '>'.$tag->tag.'</option>';
}
?>
</select>
</div>