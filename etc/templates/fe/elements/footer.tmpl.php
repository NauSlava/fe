<?php /** @var TemplateItemWrapper $tiw */ ?>
<footer class="">
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-3 noPhone">
                <? if( !empty( $__footerOne )){ ?>
	                <ul class="list-unstyled">
        	            <? foreach( $__footerOne as $item ){ ?>
	        	            <li><a href="{$item.url}" title="{$item.title}">{$item.title}</a></li>
	                    <? } ?>
        	        </ul>
                <? } ?>
            </div>
            <div class="col-md-3 noPhone">
                 <? if( !empty( $__footerTwo )){ ?>
			<ul class="list-unstyled">
				<?php foreach( $__footerTwo as $item ){ ?>
					<li><a href="{$item.url}" title="{$item.title}">{$item.title}</a></li>
				<?php } ?>
			</ul>
                <?php } ?>
            </div>
            <div class="col-md-3 noPhone">
                <?php if( !empty( $__footerFour )){ ?>
			<ul class="list-unstyled">
				<? foreach( $__footerFour as $item ){ ?>
					<li><a href="{$item.url}" title="{$item.title}">{$item.title}</a></li>
				<? } ?>
			</ul>
                <? } ?>
            </div>
            <div class="col-md-3 col-12">                            
		<a class="phone d-inline text-lg-right" href="tel://8-903-724-09-24"><strong>8-903-724-09-24</strong></a>
                <ul class="list-inline socials text-center text-sm-right">
                    <li class="list-inline-item circle-number-s"><a href=""><i class="fa fa-facebook">&nbsp;</i></a></li>
                    <li class="list-inline-item circle-number-s"><a href=""><i class="fa fa-vk">&nbsp;</i></a></li>
                    <li class="list-inline-item circle-number-s"><a href=""><i class="fa fa-twitter">&nbsp;</i></a></li>
                </ul>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-4 col-12 text-center text-sm-left" style="font-size: 14px;">Copyright © 2014-<?=date('Y');?> «Recro» Все права защищены</div>
            <div class="col-md-6 noPhone" style="font-size: 14px;">
                <span class="address-footer">Адрес: Московская область, г. Подольск, ул Шамотная <a class="underline" href="/contacts/">Схема проезда</a></span>
            </div>
        </div>
    </div>
</footer>

<div class="fixformContact">
    <div class="m-auto w600">
        <div class="fixformContact--title vspl">Написать письмо<div class="fixformContact--close"></div></div>
        <div class="fixformContact--body vspl">
            <section class="section section-contact mt-3">
                <div class="section--content">
                    <form class="form form-contact" action="/contacts/" method="post">
			<input type='hidden' name="product_id" value='<? echo $product->productId; ?>'>
                        <?= SecureTokenHelper::FormHidden();?>
                        <p>Заполните необходимые поля. Наш сотрудник свяжется с вами в ближайшее время.</p>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <input class="form-control" type="text" name="message[contact]" value="" placeholder="Имя *"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="message[email]"  value="" placeholder="Email*" />
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="text"  name="message[phone]" value=""  placeholder="Телефон для связи" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <textarea class="form-control" name="message[message]"  placeholder="Ваше сообщение"></textarea>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <div class="form-check">
                                <input class="form-check-input" name="message[isCopy]" type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    Отправить копию на ваш e-mail
                                </label>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <button class="button button-pink" name="save" value="true" onclick="yaCounter29298175.reachGoal('request_success');return true;">Отправить сообщение</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
</div>
<div id='out'></div>
<script rel="preload" as="script" src="/shared/js/fe/jquery-3.3.1.min.js"></script>
<!--script rel="preload" as="script" src="/shared/js/fe/bootstrap.min.js"></script-->
<script rel="preload" as="script" src="/shared/js/fe/jquery.fancybox.pack.js"></script>
<!--script>
      var loadDeferredStyles = function() {
        var addStylesNode = document.getElementById("deferred-styles");
        var replacement = document.createElement("div");
        replacement.innerHTML = addStylesNode.textContent;
        document.body.appendChild(replacement)
        addStylesNode.parentElement.removeChild(addStylesNode);
      };
      var raf = window.requestAnimationFrame || window.mozRequestAnimationFrame ||
          window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;
      if (raf) raf(function() { window.setTimeout(loadDeferredStyles, 0); });
      else window.addEventListener('load', loadDeferredStyles);
</script-->

<!--script src="/shared/js/fe/custom.js"></script>
<script>
        (function(w,d,u){
                var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/60000|0);
                var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
        })(window,document,'https://cdn-ru.bitrix24.ru/b20449236/crm/site_button/loader_3_hzzsmi.js');
</script-->

<!--script async src="https://www.googletagmanager.com/gtag/js?id=G-71XPKMKH5Z"></script-->
<!-- Yandex.Metrika counter -->
<script>
$('.navbar-toggler').click(function(){
//alert('aside');
$('#globalNavbarMobile').toggle();
});

var fired = false;
window.addEventListener('scroll', () => {
    if (fired === false) {
        fired = true;
       
        setTimeout(() => {
		var gt = document.createElement('script');
		gt.src = "https://www.googletagmanager.com/gtag/js?id=G-71XPKMKH5Z";
		document.body.appendChild(gt);

		var bs = document.createElement('script');
		bs.src = "/shared/js/fe/bootstrap.min.js";
		document.body.appendChild(bs);

		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
// UA-126417998-1
		gtag('config', 'G-71XPKMKH5Z');

		(function (d, w, c) {
			(w[c] = w[c] || []).push(function() {
				try {
					w.yaCounter50474242 = new Ya.Metrika2({
					id:50474242,
					clickmap:true,
					trackLinks:true,
					accurateTrackBounce:true,
					webvisor:true
					});
				} 
				catch(e) { }
			});

			var n = d.getElementsByTagName("script")[0],
			s = d.createElement("script"),
			f = function () { n.parentNode.insertBefore(s, n); };
			s.type = "text/javascript";
			s.async = true;
			s.src = "https://mc.yandex.ru/metrika/tag.js";
			if (w.opera == "[object Opera]") {
				d.addEventListener("DOMContentLoaded", f, false);
			} else { f(); }
	    }) (document, window, "yandex_metrika_callbacks2");

        }, 1000)
    }
});
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/50474242" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!--noscript><div><img src="https://mc.yandex.ru/watch/50474242" style="position:absolute; left:-9999px;" alt="YandexCounter" /></div></noscript-->
<script src="//cdn.callibri.ru/callibri.js" type="text/javascript" charset="utf-8"></script>

<link rel="stylesheet" href="https://cdn.envybox.io/widget/cbk.css">
<script type="text/javascript" src="https://cdn.envybox.io/widget/cbk.js?wcb_code=5dbb172867587220d81b788fc3e72dce" charset="UTF-8" async></script>
<script type="text/javascript" src="//api.venyoo.ru/wnew.js?wc=venyoo/default/science&widget_id=6755342139800093"></script>
<script>
        (function(w,d,u){
                var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/60000|0);
                var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
        })(window,document,'https://cdn-ru.bitrix24.ru/b20449236/crm/site_button/loader_1_etrwjg.js');
</script>
</body>
</html>
