<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Tektonmaster
 */

?>
<div class="contacts_us">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="contacts_us_info_wrapper">
					<div class="contacts_us_info_item">
						<h3>Как с нами связаться</h3>
						<a href="tel:8 905 570 40 78">8 905 570 40 78</a>
					</div>

					<div class="contacts_us_info_item">
						<h3>Как нас найти</h3>
						<address>г. Коломна, ул. Уманская, д.3А, оф.219 <br> (здание ОАО “Текстильмаш”)</address>
					</div>

					<div class="contacts_us_info_item">
						<h3>Часы работы</h3>
						<p>Пн - Пт: с 09:00 до 18:00 <br> Сб - Вс: Выходной<p>
					</div>
				</div>
				<div class="contacts_us_feedback_wrapper">
					<div class="contacts_us_feedback" style="background-image: url(<?php echo get_template_directory_uri(). "/assets/img/main-bg-768x432.jpg";?>)">
						<h3>Оставьте заявку и наши специалисты свяжутся с вами в ближайшее время чтобы обсудить все детали вашего будущего дома мечты!</h3>

						<div class="principles_button_wrapper"><a href="#modal-feedback_bot" uk-toggle="" class="button__normal-black">Заказать проект дома</a>
							<div id="modal-feedback_bot" uk-modal="">
								<div class="uk-modal-dialog uk-modal-body">
									<h2 class="second_heading">Построить дом мечты</h2>
									<p>Оставьте заявку и наши специалисты свяжутся с вами в ближайшее время чтобы обсудить все детали вашего будущего дома мечты!</p>
									<?php echo do_shortcode('[contact-form-7 id="90" title="Контактная форма 1"]'); ?>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
<footer class="footer">

	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-4">
				<div class="footer_logo_wrapper">
                    <?php if(is_home() || is_front_page()): ?>
                        <div class="logo">
                            <h3>Тектонмастер</h3>
                            <h4>Строительство домов под ключ с гарантией 50 лет</h4>
                        </div>

                    <?php else: ?>
                        <div class="logo">
                            <a href="<?php echo get_home_url()?>"> Тектонмастер <span>Строительство домов под ключ с гарантией 50 лет</span></a>
                        </div>
                    <?php endif; ?>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="footer_right_wrapper">
					<div class="footer_menu"></div>
					<div class="footer_social_icons">
						<ul class="social_icons_list">
							<li class="social_icons_item"><a href="https://vk.com/tm_kolomna" class="social_icons_item_link"><img src="<?php echo get_template_directory_uri() ?>/assets/img/vk-social-network-logo.svg" /></a></li>
							<li class="social_icons_item"><a href="https://www.instagram.com/tekton_master/" class="social_icons_item_link"><img src="<?php echo get_template_directory_uri() ?>/assets/img/instagram.svg" /></a></li>
							<li class="social_icons_item"><a href="https://www.youtube.com/channel/UCMD7IhLxVN_FmICb8mmeRmw" class="social_icons_item_link"><img src="<?php echo get_template_directory_uri() ?>/assets/img/youtube.svg" /></a></li>
						</ul>
					</div>
				</div>
			</div>
            <div class="col-lg-4"></div>
		</div>
	</div>
</footer><!-- #colophon -->
</div><!-- #page -->

<!--
HIDDEN BLOCKS
-->
<!-- Yandex.Metrika counter -->

<div id="modal-question" uk-modal="">
    <div class="uk-modal-dialog uk-modal-body">
        <h2 class="second_heading">Построить дом мечты</h2>
        <p>Оставьте заявку и наши специалисты свяжутся с вами в ближайшее время чтобы обсудить все детали вашего будущего дома мечты!</p>
        <?php echo do_shortcode('[contact-form-7 id="90" title="Контактная форма 1"]'); ?>
    </div>
</div>


<?php wp_footer(); ?>

<script type="text/javascript" >
    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(47680306, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true,
        ecommerce:"dataLayer"
    });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/47680306" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->


</body>

</html>