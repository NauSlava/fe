<?php /** @var TemplateItemWrapper $tiw */ ?>
<footer class="mt-5">
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-3">
                <?php if( !empty( $__footerOne )){ ?>
                <ul class="list-unstyled">
                    <?php foreach( $__footerOne as $item ){ ?>
                    <li><a href="{$item.url}" alt="{$item.title}">{$item.title}</a></li>
                    <?php } ?>
                </ul>
                <?php } ?>
            </div>
            <div class="col-md-3">
                 <?php if( !empty( $__footerTwo )){ ?>
				 <ul class="list-unstyled">
					<?php foreach( $__footerTwo as $item ){ ?>
						<li><a href="{$item.url}" alt="{$item.title}">{$item.title}</a></li>
					<?php } ?>
				</ul>
                <?php } ?>
            </div>
            <div class="col-md-3">
                <?php if( !empty( $__footerFour )){ ?>
				<ul class="list-unstyled">
					<?php foreach( $__footerFour as $item ){ ?>
						<li><a href="{$item.url}" alt="{$item.title}">{$item.title}</a></li>
					<?php } ?>
				</ul>
                <?php } ?>
            </div>
            <div class="col-md-3">
                <p class="footer-phone">
                    <?= $tiw->GetPhoneFooter(); ?>
                </p>
                <p>
                    Московская область, г. Подольск,<br/> ул Шамотная
                </p>
                <ul class="list-inline socials">
                    <li class="list-inline-item"><a href=""><i class="fa fa-facebook">&nbsp;</i></a></li>
                    <li class="list-inline-item"><a href=""><i class="fa fa-vk">&nbsp;</i></a></li>
                    <li class="list-inline-item"><a href=""><i class="fa fa-twitter">&nbsp;</i></a></li>
                </ul>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                Copyright © 2014-<?=date('Y');?> «Recro» Все права защищены
            </div>
        </div>
    </div>
</footer>

<div class="fixformContact">
    <div class="fixformContact--title vspl">
        Написать письмо
        <div class="fixformContact--close"></div>
    </div>
    <div class="fixformContact--body vspl">
        <section class="section section-contact mt-3">
            <div class="section--content">
                <form class="form form-contact" role="form" action="/contacts/" method="post">
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
                            <button class="button button-pink" name="save" value="true" onclick="yaCounter29298175.reachGoal("request_success");return true;">Отправить сообщение</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>
 <noscript id="deferred-styles">
       <link href="/shared/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">	
 	<link href="/shared/css/fe/bootstrap.min.css" rel="stylesheet">
    <?= CssHelper::Flush(); echo "\n"; ?>
    </noscript>
<script>
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
</script>
<?= JsHelper::Flush(); echo "\n"; ?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126417998-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-126417998-1');
</script>
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
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
            } catch(e) { }
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
    })(document, window, "yandex_metrika_callbacks2");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/50474242" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<script src="//code.jivosite.com/widget.js" data-jv-id="79pkIhbxdc" async></script>
</body>
</html>
