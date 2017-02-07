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
<?php $bgSlider = JURI::base() . "templates/svetlijdom.ru_frontpage/images/bgslide.png"; ?>
<div id="k2ModuleBox<?php echo $module->id; ?>" class="sliderk2ItemsBlock">
<?php if(count($items)): ?>
<ul id="iview" class="sliderItem">
<?php foreach ($items as $key=>$item):	?>
<li data-iview:image="<?php echo $bgSlider; ?>" data-iview:transition="slice-top-fade,slice-right-fade" class="<?php echo ($key%2) ? "odd" : "even"; if(count($items)==$key+1) echo ' lastItem'; ?>">
<?php if($params->get('itemImage') && isset($item->image)): ?>
<div class="sliderItemImage">
<a class="iview-caption" data-transition="fade" href="<?php echo $item->link; ?>">
<img src="<?php echo $item->image; ?>" alt="<?php echo K2HelperUtilities::cleanHtml($item->title); ?>"/>
</a>
<?php if($item->extraFields->tipProperti->value != ''): ?>
<div class="ItemExtraFieldsValueType iview-caption" data-transition="wipeUp">
<span><?php echo $item->extraFields->tipProperti->value; ?></span>
</div>
<?php endif; ?>
<?php if($item->extraFields->price->value != ''): ?>
<div class="iview-caption ItemExtraFieldsValuePrice" data-width="250" data-transition="wipeUp">
<span><?php echo $item->extraFields->price->value; ?>
<?php if($item->categoryname == "Зарубежная"){ ?>
EUR
<?php }else { ?>
р.
<?php } ?>
</span>
</div>
<?php endif; ?>
</div>
<?php endif; ?>
<?php if($params->get('itemTitle') || $params->get('itemIntroText')): ?>
<div class="sliderContent iview-caption" data-width="310" data-transition="wipeRight">
<?php if($params->get('itemTitle')): ?>
<h2><a class="sliderItemTitle" href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a></h2>
<?php endif; ?>
<?php if($params->get('itemIntroText')): ?>
<div class="sliderItemIntrotext">
<?php echo $item->introtext; ?>
</div>
<?php endif; ?>
<?php if($params->get('itemReadMore') && $item->fulltext): ?>
<a class="sliderItemReadMore" href="<?php echo $item->link; ?>">
<?php echo JText::_('K2_READ_MORE'); ?>
</a>
<?php endif; ?>
</div>
<?php endif; ?>
</li>
<?php endforeach; ?>
</ul>
<?php endif; ?>
<?php if($params->get('itemCustomLink')): ?>
<a class="moduleCustomLink" href="<?php echo $params->get('itemCustomLinkURL'); ?>" title="<?php echo K2HelperUtilities::cleanHtml($itemCustomLinkTitle); ?>"><?php echo $itemCustomLinkTitle; ?></a>
<?php endif; ?>
<?php if($params->get('feed')): ?>
<div class="k2FeedIcon">
<a href="<?php echo JRoute::_('index.php?option=com_k2&view=itemlist&format=feed&moduleID='.$module->id); ?>" title="<?php echo JText::_('K2_SUBSCRIBE_TO_THIS_RSS_FEED'); ?>">
<span><?php echo JText::_('K2_SUBSCRIBE_TO_THIS_RSS_FEED'); ?></span>
</a>
<div class="clr"></div>
</div>
<?php endif; ?>
</div>
