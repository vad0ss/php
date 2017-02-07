<?php
// no direct access
defined('_JEXEC') or die('Restricted access');
?>
<script type="text/javascript">
jQuery(document).ready(function () {
jQuery("input.datepicker").datepicker({ dateFormat: 'yy-mm-dd' });
});
</script>
<div class="k2filter-field-text-date k2filter-field-<?php echo $i; ?>">
<h3>
<?php echo $extra_fields_name[$j]; ?>
</h3>
<input class="datepicker inputbox" name="searchword<?php echo $field_id[$j];?>" type="text" <?php if (JRequest::getVar('searchword'.$field_id[$j])) echo ' value="'.JRequest::getVar('searchword'.$field_id[$j]).'"'; ?> />
</div>
