<?php
/**
* @version		2.6.x
* @package		K2
* @author		JoomlaWorks http://www.joomlaworks.net
* @copyright	Copyright (c) 2006 - 2014 JoomlaWorks Ltd. All rights reserved.
* @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
*/
// no direct access
defined('_JEXEC') or die;
?>
<div id="k2ModuleBox<?php echo $module->id; ?>" class="k2ItemsBlock<?php if($params->get('moduleclass_sfx')) echo ' '.$params->get('moduleclass_sfx'); ?>">
<?php if($params->get('itemCustomLink')): ?>
<a class="moduleCustomLink" href="<?php echo $params->get('itemCustomLinkURL'); ?>" title="<?php echo K2HelperUtilities::cleanHtml($itemCustomLinkTitle); ?>"><?php echo $itemCustomLinkTitle; ?></a>
<?php endif; ?>
<?php if(count($items)): ?>
<ul>
<?php foreach ($items as $key=>$item):	?>
<li class="<?php echo ($key%2) ? "odd" : "even"; if(count($items)==$key+1) echo ' lastItem'; ?>">
<!-- Plugins: BeforeDisplay -->
<?php echo $item->event->BeforeDisplay; ?>
<!-- K2 Plugins: K2BeforeDisplay -->
<?php echo $item->event->K2BeforeDisplay; ?>
<?php if($params->get('itemTitle')): ?>
<h2 class="catItemTitle">
<a href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a>
</h2>
<?php endif; ?>
<?php if($params->get('itemCategory')): ?>
<div class="catItemCategory">
<a href="<?php echo $item->categoryLink; ?>"><?php echo $item->categoryname; ?> недвижимость</a>
<?php if($item->extraFields->tipProperti->value != ''): ?>
/ <?php echo $item->extraFields->tipProperti->value; ?>
<?php endif; ?>
</div>
<?php endif; ?>
<!-- Plugins: AfterDisplayTitle -->
<?php echo $item->event->AfterDisplayTitle; ?>
<!-- K2 Plugins: K2AfterDisplayTitle -->
<?php echo $item->event->K2AfterDisplayTitle; ?>
<!-- Plugins: BeforeDisplayContent -->
<?php echo $item->event->BeforeDisplayContent; ?>
<!-- K2 Plugins: K2BeforeDisplayContent -->
<?php echo $item->event->K2BeforeDisplayContent; ?>
<?php if($params->get('itemImage')): ?>
<?php if($params->get('itemImage') && isset($item->image)): ?>
<a class="moduleItemImage" href="<?php echo $item->link; ?>" title="<?php echo JText::_('K2_CONTINUE_READING'); ?> &quot;<?php echo K2HelperUtilities::cleanHtml($item->title); ?>&quot;">
<div>
<img src="<?php echo $item->image; ?>" alt="<?php echo K2HelperUtilities::cleanHtml($item->title); ?>"/>
</div>
</a>
<?php endif; ?>
<?php endif; ?>
<?php if($params->get('itemExtraFields') && count($item->extra_fields)): ?>
<div class="catItemExtraFields">
<ul>
<?php if($item->extraFields->tipProperti->value != ''): ?>
<li>
<span class="catItemExtraFieldsLabel"><?php echo $item->extraFields->tipProperti->name; ?></span>
<span class="catItemExtraFieldsValue"><?php echo $item->extraFields->tipProperti->value; ?></span>
</li>
<?php endif; ?>
<?php if($item->extraFields->area->value != ''): ?>
<li>
<span class="catItemExtraFieldsLabel"><?php echo $item->extraFields->area->name; ?></span>
<span class="catItemExtraFieldsValue"><?php echo $item->extraFields->area->value; ?> м2</span>
</li>
<?php endif; ?>
<?php if($item->extraFields->floor->value != ''): ?>
<li>
<span class="catItemExtraFieldsLabel"><?php echo $item->extraFields->floor->name; ?></span>
<span class="catItemExtraFieldsValue"><?php echo $item->extraFields->floor->value; ?></span>
</li>
<?php endif; ?>
<?php if($item->extraFields->metro->value != '' && $item->categoryname == "Московская"): ?>
<li>
<span class="catItemExtraFieldsLabel"><?php echo $item->extraFields->metro->name; ?></span>
<span class="catItemExtraFieldsValue"><?php echo $item->extraFields->metro->value; ?></span>
</li>
<?php endif; ?>
<?php if($item->extraFields->kilometpovotMKAD->value != '' && ($item->categoryname == "Подмосковная" || $item->categoryname == "Загородная")): ?>
<li>
<span class="catItemExtraFieldsLabel">От МКАД:</span>
<span class="catItemExtraFieldsValue"><?php echo $item->extraFields->kilometpovotMKAD->value; ?> км</span>
</li>
<?php endif; ?>
<?php if($item->extraFields->distanceSea->value != '' && $item->categoryname == "Зарубежная"): ?>
<li>
<span class="catItemExtraFieldsLabel">От моря:</span>
<span class="catItemExtraFieldsValue"><?php echo $item->extraFields->distanceSea->value; ?> м</span>
</li>
<?php endif; ?>
<?php if($item->extraFields->price->value != ''): ?>
<li>
<span class="catItemExtraFieldsLabel"><?php echo $item->extraFields->price->name; ?></span>
<span class="catItemExtraFieldsValuePrice"><?php echo $item->extraFields->price->value; ?> р.</span>
</li>
<?php endif; ?>
</ul>
<?php if($params->get('itemReadMore') && $item->fulltext || count($item->extra_fields)): ?>
<a class="k2ReadMore" href="<?php echo $item->link; ?>">
<?php echo JText::_('K2_READ_MORE'); ?>
</a>
<?php endif; ?>
</div>
<?php endif; ?>
<div class="clr"></div>
<!-- Plugins: AfterDisplayContent -->
<?php echo $item->event->AfterDisplayContent; ?>
<!-- K2 Plugins: K2AfterDisplayContent -->
<?php echo $item->event->K2AfterDisplayContent; ?>
<!-- Plugins: AfterDisplay -->
<?php echo $item->event->AfterDisplay; ?>
<!-- K2 Plugins: K2AfterDisplay -->
<?php echo $item->event->K2AfterDisplay; ?>
<div class="clr"></div>
</li>
<?php endforeach; ?>
<li class="clearList"></li>
</ul>
<?php endif; ?>
</div>
