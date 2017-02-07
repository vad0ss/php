<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta name='yandex-verification' content='78a3c33bf78c008f' />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="<?php echo $this->baseurl ?>/templates/svetlijdom.ru_frontpage/css/template.css">
<jdoc:include type="head" />
<script src="<?php echo $this->baseurl ?>/buyme/js/buyme.js" charset="utf-8"></script>
<script src="<?php echo $this->baseurl ?>/templates/svetlijdom.ru_frontpage/js/raphael-min.js"></script>
<script src="<?php echo $this->baseurl ?>/templates/svetlijdom.ru_frontpage/js/jquery.easing.js"></script>
<script src="<?php echo $this->baseurl ?>/templates/svetlijdom.ru_frontpage/js/iview.js"></script>
<script type="text/javascript" src="http://consultsystems.ru/script/26342/" charset="utf-8"></script>
</head>
<body>
<div id="<?php if (JURI::current() == JURI::base() || JMenuSite::getInstance('site')->getActive()->home){ echo 'header-full';} else {echo 'header';} ?>">
<div class="container header">
<a href="<?php echo $this->baseurl ?>"><img src="<?php echo $this->baseurl ?>/templates/svetlijdom.ru_frontpage/images/logo.png" class="logo" alt="svetlij"></a>
<a href="skype:+74956416904?call" class="phone"></a>
<a href="skype:svetlijdom.ru?call" class="consult"></a>
<?php if ($this->countModules('menu')) : ?>
<jdoc:include type="modules" name="menu" />
<?php endif; ?>
</div>
<?php if ($this->countModules('slider') || $this->countModules('filter1')) : ?>
<div class="container head-obj">
<?php if ($this->countModules('slider')) : ?>
<div class="col1">
<jdoc:include type="modules" name="slider" />
<script>
jQuery('#iview').iView({
pauseTime: 7000, // Задержка в переключении слайдов
directionNav: true, // previous,next navigation
previousLabel: "<span></span>", // текст для кнопки "Назад"
nextLabel: "<span></span>", // текст для кнопки "Вперед"
controlNav: false, // Элементы управления
controlNavThumbs: false, // Показать кнопки навигации
autoAdvance: true, // Автопереход
touchNav: false, // Использование сенсорного дисплея, чтобы изменить слайды
captionSpeed: 700, //Скорость перехода подписей
animationSpeed: 100, // Скорость перехода
pauseOnHover: true, // Остановить слайды при наведении
timer: 'none', // Строка процеса: "Pie", "360Bar" or "Bar"
});
</script>
</div>
<?php endif; ?>
<?php if ($this->countModules('filter1')) : ?>
<div class="col2">
<jdoc:include type="modules" name="filter1" />
</div>
<?php endif; ?>
</div>
<?php endif; ?>
<?php if ($this->countModules('middleModule')) : ?>
<jdoc:include type="modules" name="middleModule" />
<?php endif; ?>
<?php if ($this->countModules('filterCategory')) : ?>
<jdoc:include type="modules" name="filterCategory" />
<?php endif; ?>
</div>
<?php if(JURI::current() == JURI::base()) {?>
<div class="container table" id="cols2">
<?php if ($this->countModules('frontBottomModule')) : ?>
<div class="containerFrontModule">
<jdoc:include type="modules" name="frontBottomModule" />
</div>
<?php endif; ?>
<?php if ($this->countModules('frontBottomModule2')) : ?>
<div class="licenses">
<jdoc:include type="modules" name="frontBottomModule2" />
</div>
<?php endif; ?>
</div>
<?php } ?>
<div class="container" id="one_col">
<jdoc:include type="component" />
</div>
<div id="footer">
<div class="container">
<div class="col1">
<span>(495) 120-06-69</span>
<a href="http://www.svetlijdom.ru/index.php?option=com_svd&view=svd&Itemid=5">info@svetlijdom.ru</a>
</div>
<div class="col2">
&copy; Светлый Дом, 2011 - <?php echo date('Y'); ?>. Все права защищены
<br><a href="http://www.cover.lv">Создание и продвижение сайта</a>
</div>
</div>
</div>
<!-- Yandex.Metrika counter -->
<div style="display:none;"><script type="text/javascript">
(function(w, c) {
(w[c] = w[c] || []).push(function() {
try {
w.yaCounter10609483 = new Ya.Metrika({id:10609483, enableAll: true});
}
catch(e) { }
});
})(window, "yandex_metrika_callbacks");
</script></div>
<script src="//mc.yandex.ru/metrika/watch.js" type="text/javascript" defer="defer"></script>
<noscript><div><img src="//mc.yandex.ru/watch/10609483" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-21416913-3']);
_gaq.push(['_trackPageview']);
(function() {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>
<?php echo __FILE__ ; ?>
</body>
</html>