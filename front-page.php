<?php

get_header();
?>
<?php

$slide_image = get_field('изображение_главной');
$advantages = get_field('наши_преимущества')

?>

<div class="main__slider">
    <img src="<?php echo $slide_image['url']; ?>" class="main__slider-image" alt="<?php echo strip_tags(get_field('ключевая_фраза')); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="slider__container">
                    <div class="slider__phrase">
                        <?php echo get_field('ключевая_фраза') ?>
                        <div class="advantages__wrapper">
                            <?php foreach ($advantages as $item) : ?>
                                <div class="advantages__box">
                                    <img class="image" src="<?php echo $item['изображение_преимущества']['url']; ?>" alt="<?php echo $item['текст_преимущества'] ?>">
                                    <h4 class="heading"><?php echo $item['текст_преимущества']; ?></h4>
                                </div>
                            <?php endforeach; ?>
                        </div>


                    </div>

                    <div class="slider__contact">
                        <?php echo do_shortcode('[contact-form-7 id="877" title="Основная форма (первая страница)"]'); ?>
                    </div>
                </div>





            </div>
        </div>
    </div>
</div>

<div class="projects__menu-wrapper">

    <?php $projects_slide = get_field('меню_категорий_проектов'); ?>

    <div class="projects__menu-carousel owl-carousel">

        <?php foreach ($projects_slide as $key => $value) : ?>

            <div class="projects__menu-item">
                <div class="projects__menu-item-top">
                    <a href="<?= $value['ссылка']['url'] ?>">
                        <img src="<?= $value['изображение']['sizes']['slider_menu_img'] ?>" alt="<?= $value['ссылка']['title'] ?>">

                    </a>
                </div>
                <div class="projects__menu-item-bot">
                    <a href="<?= $value['ссылка']['url'] ?>" class="button__normal-accent">Посмотреть</a>
                    <h3><?= $value['ссылка']['title'] ?></h3>
                </div>
            </div>

        <?php endforeach; ?>

    </div>

</div>

<section class="services">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="second_heading">Предоставление услуг по <strong>строительству домов </strong></h1>
            </div>
        </div>
        <div uk-scrollspy="cls: uk-animation-scale-down; target: &gt; .col-md-2 &gt; .services_item; delay: 150; repeat: false" class="row">
            <?php $services = get_field('перечень_услуг');

            foreach ($services as $key => $value) : ?>

                <div class="col-md-2 col-sm-4 col-6 item">
                    <div class="services_item"><img src="<?php echo $value['изображение']['url'] ?>" alt="<?php echo $value['описание_поля']['title'] ?>" />
                        <h2><?php echo $value['описание_поля'] ?></h2>
                    </div>
                </div>

            <?php endforeach; ?>


        </div>
    </div>
</section>

<section class="popular__projects-wrapper" style="background-image: url('<?php echo get_template_directory_uri() ?>/assets/img/bg3_svg.svg')">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="second_heading">Популярные проекты</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="popular__projects-slider owl-carousel">

                    <?php

                    $popularProject = get_field('популярные_проекты');

                    foreach ($popularProject as $key => $value) : ?>

                        <?php
                        $img = get_field('слайдер', $value['проект']);
                        $info = get_field('информация_о_доме', $value['проект']);
                        $globalInfo = get_post($value['проект'], ARRAY_A, 'row');

                        ?>

                        <div class="popular__projects-item">
                            <div class="popular__projects-item-content">
                                <div class="popular__projects-item-heading">
                                    <span><?php echo $info['проект'] ?></span>
                                    <h2> <?php echo $globalInfo['post_title'] ?></h2>
                                </div>
                                <div class="popular__projects-item-content-descr">
                                    <?php echo $info['краткое_описание'] ?>
                                </div>
                                <a class="button__normal" href="<?php echo $globalInfo['guid'] ?>">Смотреть комплектации</a>

                            </div>
                            <div class="popular__projects-item-img">

                                <img src="<?php echo $img[0]['изображение'][0]['sizes']['slider_img'] ?>" alt="">
                                <div class="popular__projects-item-info">
                                    <p><?php echo $info['сколько_комнат'] ?> <br> <span>Спальни</span></p>
                                    <p><?php echo $info['сколько_ванн'] ?> <br> <span>Ванны</span></p>
                                    <p><?php echo $info['сколько_площадь'] ?> <br> <span>Общая площадь</span></p>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
</section>

<?php // $test = get_field('тест'); var_dump($test)
?>

<section class="our_works">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="second_heading">Наши работы</h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div uk-lightbox="animation: slide" id="gallery">
                    <?php

                    $galery = get_field('галерея');

                    foreach ($galery as $key => $value) : ?>

                        <div>
                            <a class="uk-inline" href="<?php echo $value['sizes']['galley_home_img'] ?>" <?php if ($value['изображение']['caption']) : ?>data-caption="<?php echo $value['изображение']['caption'] ?> <?php endif; ?>">
                                <img src="<?php echo $value['sizes']['galley_home_img'] ?>" alt="<?php echo $value['изображение']['caption'] ?>">
                            </a>
                        </div>

                    <?php endforeach; ?>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="our_works_button_wrapper">
                    <a href="tel:89055704078" class="button__normal">Консультация</a>
                    <a href="#modal-project_house" uk-toggle="" class="button__normal-black">Построить дом мечты</a>
                    <div id="modal-project_house" uk-modal="">
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
</section>


<section class="principles" style="background-image: url('<?php echo get_template_directory_uri() ?>/assets/img/bg_svg.svg')">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="second_heading">Принципы нашей работы</h2>
            </div>
        </div>
    </div>
    <div class="principles_content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="principles_carousel_wrapper">
                        <div class="owl-carousel principles_carousel">

                            <?php $principles = get_field('принципы_нашей_работы');
                            foreach ($principles as $key => $value) : ?>

                                <div class="principles_carousel_item">

                                    <div class="principles_carousel_item_content">
                                        <span><?php echo $value['этап'] ?></span>
                                        <h3><?php echo $value['название_этапа'] ?></h3>
                                        <p><?php echo $value['принцип'] ?></p>
                                    </div>

                                </div>

                            <?php endforeach; ?>

                        </div>
                    </div>
                    <div class="principles_button_wrapper"><a href="#modal-buy_house" uk-toggle="" class="button__normal-black">Заказать проект дома</a>
                        <div id="modal-buy_house" uk-modal="">
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
</section>

<section class="about_us">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="second_heading">ТектонМастер - строим современные дома.</h2>
                <h3 class="third_heading"> Почему выбирают нас?</h3>
                <div class="about_us_advantages_wrapper">

                    <?php $why = get_field('почему_выбирают_нас');
                    foreach ($why as $key => $value) :
                    ?>
                        <div class="about_us_advantages_item"><span><?php echo $value['номер']; ?></span>
                            <p><?php echo $value['текст']; ?></p>
                        </div>

                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>


<section class="reviews" style="background: transparent url('<?php echo get_template_directory_uri() ?>/assets/img/bg2_svg.svg')">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="second_heading">Отзывы</h2>
            </div>
            <div class="col-md-12">
                <div class="owl-carousel carousel_reviews">

                    <?php

                    $reviews = get_field('отзывы');
                    foreach ($reviews as $key => $value) :

                    ?>

                        <div class="carousel_reviews_item">
                            <div class="reviews_content">
                                <div class="name">
                                    <h3><?php echo $value['имя'] ?></h3>
                                    <span><?php echo $value['слоган'] ?></span>
                                </div>
                                <div class="text">
                                    <p><?php echo $value['краткий_текст'] ?></p>
                                </div>
                            </div>
                            <div class="reviews_button">
                                <a uk-toggle="target: #reviews_4" class="button__normal-light">Читать полный отзыв</a>
                                <div class="reviews_modal">
                                    <div id="reviews_4" uk-modal="">
                                        <div class="reviews_full uk-modal-dialog uk-modal-body">
                                            <div class="reviews_name">
                                                <h3><?php echo $value['имя'] ?></h3>
                                                <span><?php echo $value['слоган'] ?></span>
                                            </div>
                                            <div class="reviews_text">
                                                <?php echo $value['полный_текст'] ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>



<?php

get_footer();
