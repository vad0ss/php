<?php
// no direct access
defined('_JEXEC') or die('Restricted access');
?>
<div class="k2filter-field-author-select k2filter-field-<?php echo $i; ?>">
<?php if($showtitles) : ?>
<h3><?php echo JText::_("MOD_K2_FILTER_SELECT_AUTHOR_HEADER"); ?></h3>
<?php endif; ?>
<?php
function authors_cmp($a, $b) {
return strcmp($a->name, $b->name);
}
usort($authors, 'authors_cmp');
?>
<select name="fauthor"<?php if($onchange) : ?> onchange="submit_form_<?php echo $module->id; ?>()"<?php endif; ?>>
<option value=""><?php echo JText::_('MOD_K2_FILTER_SELECT_AUTHOR_DEFAULT'); ?></option>
<?php
foreach ($authors as $author) {
echo '<option value="'.$author->id.'" ';
if (JRequest::getInt('fauthor') == $author->id) { echo 'selected="selected"'; }
echo '>'.$author->name.'</option>';
}
?>
</select>
</div>