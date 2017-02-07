<?php
/*
// K2 Multiple Extra fields Filter and Search module by Andrey M
// molotow11@gmail.com
*/
// no direct access
defined('_JEXEC') or die('Restricted access');
$language = JFactory::getLanguage();
$currentLang = $language->getTag();
list($shortLang) = explode("-", $currentLang);
$doc =& JFactory::getDocument();
?>
<script type="text/javascript">
if (typeof jQuery.ui == 'undefined') {
<?php
$doc->addStyleSheet('modules/mod_k2_filter/assets/js/jquery-ui-1.9.0.custom.min.css');
$doc->addScript('modules/mod_k2_filter/assets/js/jquery-ui-1.9.0.custom.min.js');
?>
}
<?php
$doc->addStyleSheet('modules/mod_k2_filter/assets/js/jquery.multiselect.css');
$doc->addStyleSheet('modules/mod_k2_filter/assets/js/jquery.multiselect.filter.css');
$doc->addScript('modules/mod_k2_filter/assets/js/jquery.multiselect.js');
$doc->addScript('modules/mod_k2_filter/assets/js/jquery.multiselect.filter.js');
$doc->addScript('modules/mod_k2_filter/assets/js/jquery.ui.touch-punch.min.js');
?>
jQuery(document).ready(function() {
jQuery("#K2FilterBox<?php echo $module->id; ?> form").submit(function() {
<?php if($allrequired) : ?>
if(!check_required<?php echo $module->id; ?>()) {
return false;
}
<?php endif; ?>
jQuery(this).find("input, select").each(function() {
if(jQuery(this).val() == '') {
jQuery(this).attr("name", "");
}
});
});
<?php if($ajax_results == 1) : ?>
jQuery("#K2FilterBox<?php echo $module->id; ?> input[type=submit]").click(function() {
<?php if($allrequired) : ?>
if(!check_required<?php echo $module->id; ?>()) {
return false;
}
<?php endif; ?>
ajax_results<?php echo $module->id; ?>();
return false;
});
<?php endif; ?>
});
function submit_form_<?php echo $module->id; ?>() {
<?php if($ajax_results == 1) : ?>
ajax_results<?php echo $module->id; ?>();
return false;
<?php endif; ?>
jQuery("#K2FilterBox<?php echo $module->id; ?> form").submit();
}
</script>
<div id="K2FilterBox<?php echo $module->id; ?>" class="K2FilterBlock<?php echo $params->get('moduleclass_sfx'); ?>">
<?php if($params->get('descr') != "") : ?>
<p><?php echo $params->get('descr'); ?></p>
<?php endif; ?>
<form action="<?php echo JRoute::_('index.php?option=com_k2&view=itemlist&task=filter&Itemid='.$itemid); ?>" name="K2Filter<?php echo $module->id; ?>" method="get">
<?php $app =& JFactory::getApplication(); if (!$app->getCfg('sef')): ?>
<input type="hidden" name="option" value="com_k2" />
<input type="hidden" name="view" value="itemlist" />
<input type="hidden" name="task" value="filter" />
<?php endif; ?>
<div class="k2filter-table">
<div class="k2filter-row row-0">
<div class="k2filter-cell">
<?php
$cells_counter = 1;
for($i=1; $i<($count+1); $i++) {
for ($j = 0; $j<($count); $j++) {
if(!is_array($field_id)) {
$field_tmp = $field_id;
$field_id = Array();
$field_id[$j] = $field_tmp;
}
$k = $j;
if(($field_type[$j] == 'text') && ($order[$k] == $i)) {
require (JModuleHelper::getLayoutPath('mod_k2_filter', $getTemplate.DS.'text'));
}
else if(($field_type[$j] == 'text_range') && ($order[$k] == $i)) {
require (JModuleHelper::getLayoutPath('mod_k2_filter', $getTemplate.DS.'text_range'));
}
else if(($field_type[$j] == 'text_date') && ($order[$k] == $i)) {
require (JModuleHelper::getLayoutPath('mod_k2_filter', $getTemplate.DS.'text_date'));
}
else if(($field_type[$j] == 'text_date_range') && ($order[$k] == $i)) {
require (JModuleHelper::getLayoutPath('mod_k2_filter', $getTemplate.DS.'text_date_range'));
}
else if(($field_type[$j] == 'text_az') && ($order[$k] == $i)) {
require (JModuleHelper::getLayoutPath('mod_k2_filter', $getTemplate.DS.'text_az'));
}
else if(($field_type[$j] == 'select') && ($order[$k] == $i)) {
if($connected_fields) {
foreach($connected_fields as $k=>$connected) {
if($connected[0] == $extra_fields_name[$j]) {
require (JModuleHelper::getLayoutPath('mod_k2_filter', $getTemplate.DS.'select_connected_parent'));
if(($cells_counter % $cols) == 0 && $i < $count) {
echo "</div></div>";
echo "<div class='k2filter-row'><div class='k2filter-cell'>";
}
else {
echo "</div>";
if($i != $count) {
echo "<div class='k2filter-cell'>";
}
else {
echo "</div>";
}
}
$i++;
$cells_counter++;
$con_num = count($connected);
for($n = 1; $n < $con_num; $n++) {
$connected_name = $connected[$n];
$last_child = '';
if(($n+1) == $con_num) {
$last_child = ' lastchild';
}
require (JModuleHelper::getLayoutPath('mod_k2_filter', $getTemplate.DS.'select_connected_child'));
$child_count = modK2FilterHelper::getChildsCount($extra_fields_name, $connected_name);
if(($cells_counter % $cols) == 0 && $i < ($count-($child_count - 1))) {
echo "</div></div>";
echo "<div class='k2filter-row'><div class='k2filter-cell'>";
}
else {
echo "</div>";
if($i != ($count-($child_count - 1))) {
echo "<div class='k2filter-cell'>";
}
else {
echo "</div>";
}
}
$i = $i + $child_count;
$cells_counter++;
}
continue;
}
}
$checker = 0;
foreach($connected_fields as $k=>$connected) {
foreach($connected as $conn) {
if(stripos(mb_strtolower($extra_fields_name[$j]), trim(mb_strtolower($conn))) !== FALSE) {
$checker = 1;
}
}
}
if($checker == 0) {
require (JModuleHelper::getLayoutPath('mod_k2_filter', $getTemplate.DS.'select'));
}
}
else {
require (JModuleHelper::getLayoutPath('mod_k2_filter', $getTemplate.DS.'select'));
}
}
else if(($field_type[$j] == 'select_autofill') && ($order[$k] == $i)) {
$values = modK2FilterHelper::getExtraValues($field_id[$j], $params);
require (JModuleHelper::getLayoutPath('mod_k2_filter', $getTemplate.DS.'select_autofill'));
}
else if(($field_type[$j] == 'multi') && ($order[$k] == $i)) {
require (JModuleHelper::getLayoutPath('mod_k2_filter', $getTemplate.DS.'multi'));
}
else if(($field_type[$j] == 'multi_select') && ($order[$k] == $i)) {
require (JModuleHelper::getLayoutPath('mod_k2_filter', $getTemplate.DS.'multi_select'));
}
else if(($field_type[$j] == 'multi_select_autofill') && ($order[$k] == $i)) {
$extra_fields_content[$j] = modK2FilterHelper::getExtraValues($field_id[$j], $params);
require (JModuleHelper::getLayoutPath('mod_k2_filter', $getTemplate.DS.'multi_select_autofill'));
}
else if(($field_type[$j] == 'slider') && ($order[$k] == $i)) {
require (JModuleHelper::getLayoutPath('mod_k2_filter', $getTemplate.DS.'slider'));
}
else if(($field_type[$j] == 'slider_range') && ($order[$k] == $i)) {
require (JModuleHelper::getLayoutPath('mod_k2_filter', $getTemplate.DS.'slider_range'));
}
else if(($field_type[$j] == 'slider_range_autofill') && ($order[$k] == $i)) {
$extra_fields_content[$j] = modK2FilterHelper::getExtraValues($field_id[$j], $params);
if($extra_fields_content[$j]) {
foreach($extra_fields_content[$j] as $val_k=>$value) {
$extra_fields_content[$j][$val_k] = floatval($value);
if(floatval($value) == 0) {
unset($extra_fields_content[$j][$val_k]);
}
}
sort($extra_fields_content[$j]);
}
require (JModuleHelper::getLayoutPath('mod_k2_filter', $getTemplate.DS.'slider_range_autofill'));
}
else if(($field_type[$j] == 'radio') && ($order[$k] == $i)) {
require (JModuleHelper::getLayoutPath('mod_k2_filter', $getTemplate.DS.'radio'));
}
else if(($field_type[$j] == 'label') && ($order[$k] == $i)) {
require (JModuleHelper::getLayoutPath('mod_k2_filter', $getTemplate.DS.'label'));
}
else if(($field_type[$j] == 'tag_text') && ($order[$k] == $i)) {
require (JModuleHelper::getLayoutPath('mod_k2_filter', $getTemplate.DS.'tag_text'));
}
else if(($field_type[$j] == 'tag_select') && ($order[$k] == $i)) {
$restcata = 0;
if($restmode == 1) {
$view = JRequest::getVar("view");
$task = JRequest::getVar("task");
if($view == "itemlist" && $task == "category")
$restcata = JRequest::getInt("id");
else if($view == "item") {
$id = JRequest::getInt("id");
$restcata = modK2FilterHelper::getParent($id);
}
else {
$restcata = JRequest::getVar("restcata");
}
}
$tags = modK2FilterHelper::getTags($params, $restcata);
if(count($tags)) {
require (JModuleHelper::getLayoutPath('mod_k2_filter', $getTemplate.DS.'tag_select'));
}
}
else if(($field_type[$j] == 'tag_multi') && ($order[$k] == $i)) {
$restcata = 0;
if($restmode == 1) {
$view = JRequest::getVar("view");
$task = JRequest::getVar("task");
if($view == "itemlist" && $task == "category")
$restcata = JRequest::getInt("id");
else if($view == "item") {
$id = JRequest::getInt("id");
$restcata = modK2FilterHelper::getParent($id);
}
else {
$restcata = JRequest::getVar("restcata");
}
}
$tags = modK2FilterHelper::getTags($params, $restcata);
if(count($tags)) {
require (JModuleHelper::getLayoutPath('mod_k2_filter', $getTemplate.DS.'tag_multi'));
}
}
else if(($field_type[$j] == 'tag_multi_select') && ($order[$k] == $i)) {
$restcata = 0;
if($restmode == 1) {
$view = JRequest::getVar("view");
$task = JRequest::getVar("task");
if($view == "itemlist" && $task == "category")
$restcata = JRequest::getInt("id");
else if($view == "item") {
$id = JRequest::getInt("id");
$restcata = modK2FilterHelper::getParent($id);
}
else {
$restcata = JRequest::getVar("restcata");
}
}
$tags = modK2FilterHelper::getTags($params, $restcata);
if(count($tags)) {
require (JModuleHelper::getLayoutPath('mod_k2_filter', $getTemplate.DS.'tag_multi_select'));
}
}
else if(($field_type[$j] == 'title') && ($order[$k] == $i)) {
require (JModuleHelper::getLayoutPath('mod_k2_filter', $getTemplate.DS.'title'));
}
else if(($field_type[$j] == 'title_az') && ($order[$k] == $i)) {
require (JModuleHelper::getLayoutPath('mod_k2_filter', $getTemplate.DS.'title_az'));
}
else if(($field_type[$j] == 'item_text') && ($order[$k] == $i)) {
require (JModuleHelper::getLayoutPath('mod_k2_filter', $getTemplate.DS.'item_text'));
}
else if(($field_type[$j] == 'item_all') && ($order[$k] == $i)) {
require (JModuleHelper::getLayoutPath('mod_k2_filter', $getTemplate.DS.'item_all'));
}
else if(($field_type[$j] == 'item_id') && ($order[$k] == $i)) {
require (JModuleHelper::getLayoutPath('mod_k2_filter', $getTemplate.DS.'item_id'));
}
else if(($field_type[$j] == 'category_select') && ($order[$k] == $i)) {
ob_start();
modK2FilterHelper::treeselectbox($params, 0, 0, $i, $module->id);
$category_options = ob_get_contents();
ob_end_clean();
require (JModuleHelper::getLayoutPath('mod_k2_filter', $getTemplate.DS.'category_select'));
}
else if(($field_type[$j] == 'category_multiple') && ($order[$k] == $i)) {
ob_start();
modK2FilterHelper::treeselectbox_multi($params, 0, 0, $i, $elems, $module->id);
$category_options = ob_get_contents();
ob_end_clean();
require (JModuleHelper::getLayoutPath('mod_k2_filter', $getTemplate.DS.'category_checkbox'));
}
else if(($field_type[$j] == 'category_multiple_select') && ($order[$k] == $i)) {
ob_start();
modK2FilterHelper::treeselectbox_multi_select($params, 0, 0, $i, $elems, $module->id);
$category_options = ob_get_contents();
ob_end_clean();
require (JModuleHelper::getLayoutPath('mod_k2_filter', $getTemplate.DS.'category_select_multiple'));
}
else if(($field_type[$j] == 'authors_select') && ($order[$k] == $i)) {
$authors = modK2FilterHelper::getAuthors($params);
require (JModuleHelper::getLayoutPath('mod_k2_filter', $getTemplate.DS.'authors_select'));
}
else if(($field_type[$j] == 'authors_select_multiple') && ($order[$k] == $i)) {
$authors = modK2FilterHelper::getAuthors($params);
require (JModuleHelper::getLayoutPath('mod_k2_filter', $getTemplate.DS.'authors_select_multiple'));
}
else if(($field_type[$j] == 'created') && ($order[$k] == $i)) {
require (JModuleHelper::getLayoutPath('mod_k2_filter', $getTemplate.DS.'created'));
}
else if(($field_type[$j] == 'created_range') && ($order[$k] == $i)) {
require (JModuleHelper::getLayoutPath('mod_k2_filter', $getTemplate.DS.'created_range'));
}
else if(($field_type[$j] == 'publish_up') && ($order[$k] == $i)) {
require (JModuleHelper::getLayoutPath('mod_k2_filter', $getTemplate.DS.'publish_up'));
}
else if(($field_type[$j] == 'publish_up_range') && ($order[$k] == $i)) {
require (JModuleHelper::getLayoutPath('mod_k2_filter', $getTemplate.DS.'publish_up_range'));
}
else if(($field_type[$j] == 'publish_down') && ($order[$k] == $i)) {
require (JModuleHelper::getLayoutPath('mod_k2_filter', $getTemplate.DS.'publish_down'));
}
else if(($field_type[$j] == 'publish_down_range') && ($order[$k] == $i)) {
require (JModuleHelper::getLayoutPath('mod_k2_filter', $getTemplate.DS.'publish_down_range'));
}
else if(($field_type[$j] == 'price_range') && ($order[$k] == $i)) {
require (JModuleHelper::getLayoutPath('mod_k2_filter', $getTemplate.DS.'price_range'));
}
}
if(($cells_counter % $cols) == 0 && $i < $count) {
echo "</div></div>";
echo "<div class='k2filter-row row-".$cells_counter."'><div class='k2filter-cell'>";
}
else {
if($i <= $count) {
echo "</div>";
if($i != $count) {
echo "<div class='k2filter-cell'>";
}
else {
echo "</div>";
}
}
}
$cells_counter++;
}
?>
</div><!--/k2filter-table-->
<?php if($restrict == 1) : ?>
<?php if($restmode == 1) : ?>
<?php
$restcata = "";
$view = JRequest::getVar("view");
if($view == "itemlist") {
$restcata = JRequest::getInt("id");
}
else if($view == "item") {
$id = JRequest::getInt("id");
$restcata = modK2FilterHelper::getParent($id);
}
?>
<?php if($restcata != "") : ?>
<input type="hidden" name="restcata" value="<?php echo $restcata; ?>" />
<?php endif; ?>
<?php $restauto = JRequest::getInt("restcata"); ?>
<?php if($restauto != "" && $restcata == "") : ?>
<input type="hidden" name="restcata" value="<?php echo $restauto; ?>" />
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
<input type="hidden" name="orderby" value="<?php echo JRequest::getVar("orderby"); ?>" />
<input type="hidden" name="orderto" value="<?php echo JRequest::getVar("orderto"); ?>" />
<input type="hidden" name="template_id" value="<?php echo JRequest::getVar("template_id"); ?>" />
<input type="hidden" name="moduleId" value="<?php echo $module->id; ?>" />
<input type="hidden" name="Itemid" value="<?php echo $itemid; ?>" />
<?php if ($button):?>
<input type="submit" value="<?php echo $button_text; ?>" class="button <?php echo $moduleclass_sfx; ?>" />
<?php endif; ?>
<?php if ($clear_btn):?>
<script type="text/javascript">
<!--
function clearSearch_<?php echo $module->id; ?>() {
jQuery("#K2FilterBox<?php echo $module->id; ?> form select").each(function () {
jQuery(this).val(-1);
});
jQuery("#K2FilterBox<?php echo $module->id; ?> form input.inputbox").each(function () {
jQuery(this).val("");
});
jQuery(".k2filter-field-slider").each(function() {
var slider_min = jQuery(this).find('.ui-slider').slider("option", "min");
var slider_max = jQuery(this).find('.ui-slider').slider("option", "max");
jQuery(this).find('.ui-slider').slider("values", 0, slider_min);
jQuery(this).find('.ui-slider').slider("values", 1, slider_max);
});
jQuery("#K2FilterBox<?php echo $module->id; ?> form input.slider_val").each(function () {
jQuery(this).val("");
});
jQuery("#K2FilterBox<?php echo $module->id; ?> form input[type=checkbox]").each(function () {
jQuery(this).removeAttr('checked');
});
jQuery("#K2FilterBox<?php echo $module->id; ?> form input[type=radio]").each(function () {
jQuery(this).removeAttr('checked');
});
jQuery("#K2FilterBox<?php echo $module->id; ?> a.title_az").css("font-weight", "normal").removeClass("active");
jQuery("input[name=ftitle_az]").val("");
jQuery(".k2filter-field-multi select").each(function() {
jQuery(this).multiselect("uncheckAll").multiselect("refresh");
});
jQuery(".k2filter-field-tag-multi select").multiselect("uncheckAll").multiselect("refresh");
jQuery(".k2filter-field-category-select-multiple select").multiselect("uncheckAll").multiselect("refresh");
jQuery(".k2filter-field-author-multi select").multiselect("uncheckAll").multiselect("refresh");
jQuery("#K2FilterBox<?php echo $module->id; ?> div.results_container").html("");
}
//-->
</script>
<input type="button" value="<?php echo JText::_('MOD_K2_FILTER_BUTTON_CLEAR'); ?>" class="button reset <?php echo $moduleclass_sfx; ?>" onclick="clearSearch_<?php echo $module->id; ?>()" />
<?php endif; ?>
</form>
<?php if($acounter) : ?>
<script type="text/javascript">
jQuery(document).ready(function() {
jQuery("#K2FilterBox<?php echo $module->id; ?> form").change(function() {
acounter<?php echo $module->id; ?>();
});
});
function acounter<?php echo $module->id; ?>() {
jQuery("#K2FilterBox<?php echo $module->id; ?> div.acounter").html("<p><img src='<?php echo JURI::root(); ?>media/k2/assets/images/system/loader.gif' /></p>");
jQuery.ajax({
data: jQuery("#K2FilterBox<?php echo $module->id; ?> form").serialize() + "&format=count",
type: jQuery("#K2FilterBox<?php echo $module->id; ?> form").attr('method'),
url: jQuery("#K2FilterBox<?php echo $module->id; ?> form").attr('action'),
success: function(response) {
jQuery("#K2FilterBox<?php echo $module->id; ?> div.acounter").html("<p>"+response+" <?php echo JText::_("MOD_K2_FILTER_ACOUNTER_TEXT"); ?></p>");
jQuery("#K2FilterBox<?php echo $module->id; ?> div.acounter").show();
}
});
<?php if($onchange) : ?>
submit_form_<?php echo $module->id; ?>();
<?php endif; ?>
}
</script>
<div class="acounter"></div>
<?php endif; ?>
<?php if($ajax_results == 1) : ?>
<script type="text/javascript">
function ajax_results<?php echo $module->id; ?>() {
jQuery("#K2FilterBox<?php echo $module->id; ?> div.results_container").html("<p><img src='<?php echo JURI::root(); ?>media/k2/assets/images/system/loader.gif' /></p>");
jQuery.ajax({
data: jQuery("#K2FilterBox<?php echo $module->id; ?> form").serialize() + "&format=raw",
type: jQuery("#K2FilterBox<?php echo $module->id; ?> form").attr('method'),
url: jQuery("#K2FilterBox<?php echo $module->id; ?> form").attr('action'),
success: function(response) {
jQuery("#K2FilterBox<?php echo $module->id; ?> div.acounter").hide();
jQuery("#K2FilterBox<?php echo $module->id; ?> div.results_container").html(response);
}
});
}
jQuery(document).ready(function() {
jQuery('#K2FilterBox<?php echo $module->id; ?> div.results_container div.k2Pagination a').live("click", function() {
jQuery("#K2FilterBox<?php echo $module->id; ?> div.results_container").html("<p><img src='<?php echo JURI::root(); ?>media/k2/assets/images/system/loader.gif' /></p>");
var module_pos = jQuery("#K2FilterBox<?php echo $module->id; ?>").offset();
window.scrollTo(module_pos.left,module_pos.top);
jQuery.ajax({
type: "GET",
url: jQuery(this).attr('href') + "&format=raw",
success: function(response) {
jQuery("#K2FilterBox<?php echo $module->id; ?> div.results_container").html(response);
}
});
return false;
});
});
</script>
<div class="results_container"></div>
<?php endif; ?>
<?php if($connected_fields) : ?>
<script type="text/javascript">
jQuery(document).ready(function() {
jQuery.urlParam = function(name){
var results = new RegExp('[\\?&]' + name + '=([^&#]*)').exec(window.location.href);
return results[1] || 0;
}
jQuery('#K2FilterBox<?php echo $module->id; ?> select.connected:enabled').each(function() {
var elem  = jQuery(this);
var name  = encodeURIComponent(jQuery(this).attr("rel"));
var value = encodeURIComponent(jQuery(this).find("option:selected").val());
var index = jQuery(this).find("option:selected").index();
var next  = jQuery(this).parents('.k2filter-cell').next().find("select");
if(next.length == 0) {
next =  jQuery(this).parents('.k2filter-row').next().find('.k2filter-cell:eq(0)').find("select");
}
var data = 'name='+name+'&value='+value+'&next='+encodeURIComponent(next.attr("rel")) + '&lang=<?php echo $shortLang; ?>';
<?php if($connected_show_all) : ?>
if(index == 0) {
var data_all = 'name='+name+'&value=getall&next='+encodeURIComponent(next.attr("rel")) + '&lang=<?php echo $shortLang; ?>';
jQuery.ajax({
data: data_all,
url: '<?php echo JURI::root(); ?>modules/mod_k2_filter/ajax.php',
success: function(response) {
next.append(response);
next.removeAttr("disabled");
var get_array = new Array();
<?php foreach($_GET as $k=>$val) : ?>
get_array.push("<?php echo $k; ?>");
<?php endforeach; ?>
next.find("option").each(function() {
if(jQuery(this).attr("data-extra-id") !== undefined) {
var param = 'searchword' + jQuery(this).attr("data-extra-id");
if(jQuery.inArray(param, get_array) != -1) {
var get_var = decodeURIComponent(jQuery.urlParam(param).replace(/\+/g, " "));
if(jQuery(this).text() == get_var) {
jQuery(this).attr('selected', 'selected');
}
}
}
});
}
});
}
<?php endif; ?>
if(index != 0) {
jQuery.ajax({
data: data,
url: '<?php echo JURI::root(); ?>modules/mod_k2_filter/ajax.php',
success: function(response) {
next.append(response);
next.removeAttr("disabled");
if(jQuery(response).filter("option").length != 0) {
var nextId = next.find("option:last-child").text();
next.find("option:last-child").remove();
}
if(nextId) {
next.attr("name", "searchword"+nextId);
}
var param = 'searchword'+nextId;
var get_var = decodeURIComponent(jQuery.urlParam(param).replace(/\+/g, " "));
if(get_var != 'null') {
next.find("option").each(function() {
if(jQuery(this).text() == get_var) {
jQuery(this).attr('selected', 'selected');
}
});
next_checker  = next.parents('.k2filter-cell').next().find("select");
if(next_checker.length == 0) {
next_checker =  next.parents('.k2filter-row').next().find('.k2filter-cell:eq(0)').find("select");
}
if(next_checker.length != 0) {
elem  = next;
name  = encodeURIComponent(next.attr("rel"));
value = encodeURIComponent(next.find("option:selected").val());
index = next.find("option:selected").index();
next  = next.parents('.k2filter-cell').next().find("select");
if(next.length == 0) {
next =  elem.parents('.k2filter-row').next().find('.k2filter-cell:eq(0)').find("select");
}
data = 'name='+name+'&value='+value+'&next='+encodeURIComponent(next.attr("rel")) + '&lang=<?php echo $shortLang; ?>';
jQuery.ajax({
data: data,
url: '<?php echo JURI::root(); ?>modules/mod_k2_filter/ajax.php',
success: function(response) {
next.append(response);
next.removeAttr("disabled");
if(jQuery(response).filter("option").length != 0) {
var nextId = next.find("option:last-child").text();
next.find("option:last-child").remove();
}
if(nextId) {
next.attr("name", "searchword"+nextId);
}
param = 'searchword'+nextId;
get_var = decodeURIComponent(jQuery.urlParam(param).replace(/\+/g, " "));
if(get_var != 'null') {
next.find("option").each(function() {
if(jQuery(this).text() == get_var) {
jQuery(this).attr('selected', 'selected');
}
});
next_checker  = next.parents('.k2filter-cell').next().find("select");
if(next_checker.length == 0) {
next_checker =  next.parents('.k2filter-row').next().find('.k2filter-cell:eq(0)').find("select");
}
if(next_checker.length != 0) {
elem  = next;
name  = encodeURIComponent(next.attr("rel"));
value = encodeURIComponent(next.find("option:selected").val());
index = next.find("option:selected").index();
next  = next.parents('.k2filter-cell').next().find("select");
if(next.length == 0) {
next =  elem.parents('.k2filter-row').next().find('.k2filter-cell:eq(0)').find("select");
}
data = 'name='+name+'&value='+value+'&next='+encodeURIComponent(next.attr("rel")) + '&lang=<?php echo $shortLang; ?>';
jQuery.ajax({
data: data,
url: '<?php echo JURI::root(); ?>modules/mod_k2_filter/ajax.php',
success: function(response) {
next.append(response);
next.removeAttr("disabled");
if(jQuery(response).filter("option").length != 0) {
var nextId = next.find("option:last-child").text();
next.find("option:last-child").remove();
}
if(nextId) {
next.attr("name", "searchword"+nextId);
}
param = 'searchword'+nextId;
get_var = decodeURIComponent(jQuery.urlParam(param).replace(/\+/g, " "));
if(get_var != 'null') {
next.find("option").each(function() {
if(jQuery(this).text() == get_var) {
jQuery(this).attr('selected', 'selected');
}
});
}
}
});
};
}
}
});
};
};
}
});
}
});
jQuery('#K2FilterBox<?php echo $module->id; ?> select.connected').change(function() {
var elem  = jQuery(this);
var name  = encodeURIComponent(jQuery(this).attr("rel"));
var value = encodeURIComponent(jQuery(this).find("option:selected").val());
var index = jQuery(this).find("option:selected").index();
var next  = jQuery(this).parents('.k2filter-cell').next().find("select");
if(next.length == 0) {
next =  jQuery(this).parents('.k2filter-row').next().find('.k2filter-cell:eq(0)').find("select");
}
<?php if($connected_show_all) : ?>
var extra_id = jQuery(this).find("option:selected").attr('data-extra-id');
if(extra_id !== undefined) {
elem.attr("name", "searchword" + extra_id);
}
<?php endif; ?>
if(!next.hasClass('connected') || jQuery(this).hasClass('lastchild')) {
return;
}
var data = 'name='+name+'&value='+value+'&next='+encodeURIComponent(next.attr("rel")) + '&lang=<?php echo $shortLang; ?>';
//disable all next selects
var elemIndex = jQuery('#K2FilterBox<?php echo $module->id; ?> select.connected').index(this);
var nextAll  = jQuery(this).parents('#K2FilterBox<?php echo $module->id; ?>').find('select.connected:gt('+elemIndex+')');
nextAll.each(function() {
jQuery(this).attr("disabled", 'disabled');
jQuery(this).find("option").not(':eq(0)').remove();
if(jQuery(this).hasClass("lastchild")) {
return false;
}
});
if(index == 0) {
<?php if($connected_show_all) : ?>
var data_all = 'name='+name+'&value=getall&next='+encodeURIComponent(next.attr("rel")) + '&lang=<?php echo $shortLang; ?>';
jQuery.ajax({
data: data_all,
url: '<?php echo JURI::root(); ?>modules/mod_k2_filter/ajax.php',
success: function(response) {
next.append(response);
next.removeAttr("disabled");
}
});
<?php else : ?>
return false;
<?php endif; ?>
}
jQuery.ajax({
data: data,
url: '<?php echo JURI::root(); ?>modules/mod_k2_filter/ajax.php',
success: function(response) {
next.find('option').not(':eq(0)').remove();
next.append(response);
next.removeAttr("disabled");
if(jQuery(response).filter("option").length != 0) {
var nextId = next.find("option:last-child").text();
next.find("option:last-child").remove();
}
if(nextId) {
next.attr("name", "searchword"+nextId);
}
else {
next.removeAttr("name");
}
}
});
<?php if($acounter) : ?>
jQuery("#K2FilterBox<?php echo $module->id; ?> div.acounter").html("<p><img src='<?php echo JURI::root(); ?>media/k2/assets/images/system/loader.gif' /></p>");
jQuery.ajax({
data: jQuery("#K2FilterBox<?php echo $module->id; ?> form").serialize() + "&format=count",
type: jQuery("#K2FilterBox<?php echo $module->id; ?> form").attr('method'),
url: jQuery("#K2FilterBox<?php echo $module->id; ?> form").attr('action'),
success: function(response) {
jQuery("#K2FilterBox<?php echo $module->id; ?> div.acounter").html("<p>"+response+" <?php echo JText::_("MOD_K2_FILTER_ACOUNTER_TEXT"); ?></p>");
jQuery("#K2FilterBox<?php echo $module->id; ?> div.acounter").show();
}
});
<?php if($onchange) : ?>
submit_form_<?php echo $module->id; ?>();
<?php endif; ?>
<?php endif; ?>
return false;
});
});
</script>
<?php endif; ?>
<?php if($acompleter) : ?>
<script type="text/javascript">
jQuery(document).ready(function() {
var availableTags<?php echo $module->id; ?> = [
<?php
$restcata = 0;
if($restmode == 1) {
$view = JRequest::getVar("view");
$task = JRequest::getVar("task");
if($view == "itemlist" && $task == "category")
$restcata = JRequest::getInt("id");
else if($view == "item") {
$id = JRequest::getInt("id");
$restcata = modK2FilterHelper::getParent($id);
}
else {
$restcata = JRequest::getVar("restcata");
}
}
$tags = modK2FilterHelper::getTags($params, $restcata);
?>
<?php foreach($tags as $k=>$tag) {
echo "\"" . $tag->tag . "\"";
if(($k+1) != count($tags)) {
echo ", ";
}
}
?>
];
jQuery("#K2FilterBox<?php echo $module->id; ?> input.inputbox").autocomplete({
<?php if($acounter) : ?>
select: function(event, ui) {
jQuery(this).val(ui.item.value);
acounter<?php echo $module->id; ?>()
},
<?php endif; ?>
source: function(request, response) {
var filteredArray = jQuery.map(availableTags<?php echo $module->id; ?>, function(item) {
if(item.toUpperCase().indexOf(request.term.toUpperCase()) == 0){
return item;
}
else{
return null;
}
});
response(filteredArray);
}
});
});
</script>
<?php endif; ?>
<?php if($allrequired) : ?>
<script type="text/javascript">
function check_required<?php echo $module->id; ?>() {
var checker = 1;
jQuery("#K2FilterBox<?php echo $module->id; ?> select, #K2FilterBox<?php echo $module->id; ?> input.inputbox").each(function() {
if(jQuery(this).val() == "") {
checker = 0;
}
});
if(checker == 0) {
return false;
}
return true;
}
</script>
<?php endif; ?>
</div><!-- k2-filter-box -->