<?php
// no direct access
defined('_JEXEC') or die('Restricted access');
?>
<script type="text/javascript">
jQuery(document).ready(function () {
jQuery("input.datepicker").datepicker({ dateFormat: 'yy-mm-dd' });
});
</script>
<div class="k2filter-field-publishing k2filter-field-<?php echo $i; ?>">
<h3>
<?php echo JText::_('MOD_K2_FILTER_FIELD_PUBLISHING_END'); ?>
</h3>
<input class="datepicker inputbox" name="publish_down" type="text" <?php if (JRequest::getVar('publish_down')) echo ' value="'.JRequest::getVar('publish_down').'"'; ?> />
</div>
