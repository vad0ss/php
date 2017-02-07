<?php
// no direct access
defined('_JEXEC') or die('Restricted access');
?>
<div class="k2filter-field-category-select k2filter-field-<?php echo $i; ?>">
<?php if($showtitles) : ?>
<h3>
<?php echo JText::_('MOD_K2_FILTER_FIELD_SELECT_CATEGORY_HEADER'); ?>
</h3>
<?php endif; ?>
<select name="category" <?php if($onchange) : ?>onchange="submit_form_<?php echo $module->id; ?>()"<?php endif; ?>>
<option value=""><?php echo JText::_('MOD_K2_FILTER_FIELD_SELECT_CATEGORY_DEFAULT'); ?></option>
<?php echo $category_options; ?>
</select>
</div>