<?php
// no direct access
defined('_JEXEC') or die('Restricted access');
?>
<div class="k2filter-field-text k2filter-field-<?php echo $i; ?>">
<h3>
<?php echo JText::_('MOD_K2_FILTER_FIELD_ITEM_ALL'); ?>
</h3>
<input class="inputbox" name="fitem_all" type="text" <?php if (JRequest::getVar('fitem_all')) echo ' value="'.JRequest::getVar('fitem_all').'"'; ?> />
</div>
