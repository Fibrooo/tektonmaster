<?php get_header(); ?>

<?php

$information = get_field('информация_о_доме');
$komplekt = get_field('комплектации');
$plan = get_field('планировка');
$construct_feature = get_field('конструктивные_особенности');
$project_feature = get_field('особенности_проекта');
$kalkulator = get_field('калькулятор');


$term_list = wp_get_post_terms(get_the_ID(), 'housescat', array("fields" => "names"));


if($term_list[0] == 'Каркасные') {
    $data = get_field('категория', $komplekt['выбор_комплектации']);
    $komplekt_type = ['несущий_каркас', 'дача', 'эконом', 'стандарт', 'премиум'];
}
elseif ($term_list[0] == 'Брусовые') {
    $data = get_field('категория', $komplekt['выбор_комплектации']);
    $komplekt_type = ['эконом', 'стандарт', 'премиум'];
}
elseif ($term_list[0] == 'Каменные' || $term_list[0] == 'Бани') {
    $data = get_field('комлектация', $komplekt['выбор_комплектации']);
}else {
    echo "Нет такого типа дома!";
}

?>


<div class="project_slider_wrapper">
    <div class="owl-carousel project__slider">

        <?php

        $slide = get_field('слайдер');

        foreach ($slide as $key => $value) {

            for ($i = 0; $i < count($value['изображение']); $i++) : ?>

                <div class="project__slider-item">
                    <img src="<?php echo $value['изображение'][$i]['sizes']['slider_img']; ?>" alt="Строительство дома в Коломне. Проект дома 8х9, ПР 19.22 «Модерн. Лайт». Главная перспектива." />
                </div>


        <?php endfor;
        }

        ?>

    </div>
</div>

<div class="project_slider_info">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-xs-12 position-center">
                <div class="house_info">
                    <ul class="house_info_list">
                        <li class="house_info_item">
                            <div class="house_info_item_img"><img src="<?php echo get_template_directory_uri() ?>/assets/img/bed.png" alt="Дом с <?php echo $information['сколько_комнат'] ?> спальнями. Проект дома, <?php echo $information['проект'] ?> <?php echo get_the_title() ?>." /></div>
                            <div class="house_info_item_content">
                                <p>Спален:</p><span><?php echo $information['сколько_комнат'] ?></span>
                            </div>
                        </li>
                        <li class="house_info_item">
                            <div class="house_info_item_img"><img src="<?php echo get_template_directory_uri() ?>/assets/img/bathtub.png" alt="Дом с <?php echo $information['сколько_ванн'] ?> ваннами. Проект дома, <?php echo $information['проект'] ?> <?php echo get_the_title() ?>." /></div>
                            <div class="house_info_item_content">
                                <p>Ванных комнат:</p><span><?php echo $information['сколько_ванн'] ?></span>
                            </div>
                        </li>
                        <li class="house_info_item">
                            <div class="house_info_item_img"><img src="<?php echo get_template_directory_uri() ?>/assets/img/square.png" alt="Проект дома, <?php echo $information['проект'] ?> <?php echo get_the_title() ?>." /></div>
                            <div class="house_info_item_content">
                                <p>Общая площадь:</p><span><?php echo $information['сколько_площадь'] ?> кв.м.</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-xs-12">
                <div class="house_info_price">
                        <?php
                        if($komplekt['несущий_каркас']) {
                            echo "<span>Стоимость от</span>  <h2>". $komplekt['несущий_каркас']. " млн. руб. </h2>";
                        }
                        elseif ($komplekt['стандарт']) {
                            echo "<span>Стоимость от</span>  <h2>". $komplekt['стандарт']. " млн. руб. </h2>";
                        }
                        else {
                            echo "<span>Стоимость</span> <h2>". $komplekt['теплый_контур']. " млн. руб. </h2>";
                        }
                        ?>
                    </h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="project_information">
    <!-- НАЧАЛО КОНТЕЙНЕРА -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <!-- НАЧАЛО КОМПЛЕКТАЦИИ (ОБЕРТКА)-->
                <div class="kompliktaciya_wrapper">
                    <?php if($term_list[0] === 'Каркасные'): ?>

                        <ul class="tabs" uk-switcher="animation: uk-animation-fade">
                            <li><a href="#">Комплектации</a></li>
                            <li><a href="#">Калькулятор комплектаций</a></li>
                        </ul>

                        <ul class="uk-switcher uk-margin">
                            <!-- <li> -->
                                <!-- <div class="kompliktaciya_mobile">

                                    <div class="project_information_name">
                                        <h1 class="name_house"><?php echo $information['проект'] ?> <br> <?php echo get_the_title(); ?></h1>
                                        <h2 class="name_house_dop">Каркасный дом</h2>
                                    </div>

                                    <ul uk-accordion="">
                                        <?php foreach ($komplekt_type as $item): ?>
                                            <li class="">
                                                <a href="" class="uk-accordion-title">
                                                    <?php echo  str_replace('_', ' ', $item); ?>
                                                    <?php if ($komplekt[$item]) : ?>
                                                        <span> <?php echo $komplekt[$item] ?>  млн. руб</span>
                                                    <?php else : ?>
                                                        <span>Уточняйте у менеджера</span>
                                                    <?php endif; ?>
                                                </a>
                                                <div class="uk-accordion-content">
                                                    <?php
                                                    $count = array();
                                                    foreach ($data as $value) {
                                                        echo '<h3 class="heading">'. $value['название_категории'].'</h3>';
                                                        $options = $value['тело_категории'];

                                                        $name = array();

                                                        for($i = 0; $i < count($options); $i++) {

                                                            if($options[$i][$item] == '+') {
                                                                $name[] = $options[$i]['название'];
                                                            }

                                                        }

                                                        if(!empty($name)) {
                                                            foreach ($name as $k => $v) {
                                                                echo "<p>- ". $v. "</p>";
                                                            }
                                                        }else {
                                                            echo "<p> Не предусмотренно в комплектации</p>";
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </li>
                                        <?php endforeach; ?>


                                    </ul>
                                </div> -->
                                <!-- НАЧАЛО КОМПЛЕКТАЦИИ ДЛЯ КОМПЬЮТЕРА -->
                                <!-- <div class="kompliktaciya_desctop">

                                    <div class="project_information_name">
                                        <h1 class="name_house"><span><?php echo $information['проект'] ?></span> <br> <?php echo get_the_title(); ?></h1>
                                        <h2 class="name_house_dop">Каркасный дом</h2>
                                    </div>

                                    <div uk-sticky="offset: 0; top: 70; bottom: #secial; animation: uk-animation-slide-top;" class="project_information_content_wrapper">
                                        <div class="project_information_content_row">
                                            <div class="project_information_content_col_name">
                                                <div class="project_information_content">
                                                    <h3 class="project_information_content_heading">Наименование</h3>
                                                </div>
                                            </div>
                                            <div class="project_information_content_col_name">
                                                <div class="project_information_content">
                                                    <h3>Каркас</h3>
                                                    <?php if ($komplekt['несущий_каркас']) : ?>
                                                        <span> <?php echo $komplekt['несущий_каркас'] ?> млн. руб</span>
                                                    <?php else : ?>
                                                        <span>Уточняйте у менеджера</span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="project_information_content_col_name">
                                                <div class="project_information_content">
                                                    <h3>Дача</h3>
                                                    <?php if ($komplekt['дача']) : ?>
                                                        <span> <?php echo $komplekt['дача'] ?> млн. руб</span>
                                                    <?php else : ?>
                                                        <span>Уточняйте у менеджера</span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="project_information_content_col_name">
                                                <div class="project_information_content">
                                                    <h3>Эконом</h3>
                                                    <?php if ($komplekt['эконом']) : ?>
                                                        <span> <?php echo $komplekt['эконом'] ?> млн. руб</span>
                                                    <?php else : ?>
                                                        <span>Уточняйте у менеджера</span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="project_information_content_col_name">
                                                <div class="project_information_content">
                                                    <h3>Стандарт</h3>
                                                    <?php if ($komplekt['стандарт']) : ?>
                                                        <span> <?php echo $komplekt['стандарт'] ?> млн. руб</span>
                                                    <?php else : ?>
                                                        <span>Уточняйте у менеджера</span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="project_information_content_col_name">
                                                <div class="project_information_content">
                                                    <h3>Премиум</h3>
                                                    <?php if ($komplekt['премиум']) : ?>
                                                        <span> <?php echo $komplekt['премиум'] ?> млн. руб</span>
                                                    <?php else : ?>
                                                        <span>Уточняйте у менеджера</span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php

                                    foreach ($data as $key => $value) :

                                        ?>

                                        <div class="project_information_content_name">
                                            <h3 class="heading"><?php echo $value['название_категории'] ?></h3>
                                        </div>


                                        <div class="project_information_content_wrapper">
                                            <?php for ($l = 0; $l < count($value['тело_категории']); $l++) : ?>
                                                <div class="project_information_content_row">

                                                    <div class="project_information_content_col">
                                                        <div class="project_information_content">
                                                            <p><?php echo $value['тело_категории'][$l]['название'] ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="project_information_content_col">
                                                        <div class="project_information_content"><span><?php echo $value['тело_категории'][$l]['несущий_каркас'] ?></span></div>
                                                    </div>
                                                    <div class="project_information_content_col">
                                                        <div class="project_information_content"><span><?php echo $value['тело_категории'][$l]['дача'] ?></span></div>
                                                    </div>
                                                    <div class="project_information_content_col">
                                                        <div class="project_information_content"><span><?php echo $value['тело_категории'][$l]['эконом'] ?></span></div>
                                                    </div>
                                                    <div class="project_information_content_col">
                                                        <div class="project_information_content"><span><?php echo $value['тело_категории'][$l]['стандарт'] ?></span></div>
                                                    </div>
                                                    <div class="project_information_content_col">
                                                        <div class="project_information_content"><span><?php echo $value['тело_категории'][$l]['премиум'] ?></span></div>
                                                    </div>
                                                </div>
                                            <?php endfor ?>
                                        </div>

                                    <?php endforeach; ?>
                                    <div id="secial"> </div>
                                </div> -->
                                <!-- КОНЕЦ КОМПЛЕКТАЦИИ ДЛЯ КОМПЬЮТЕРА -->
                            <!-- </li> -->
                            <li>
                                <?php
                                if($kalkulator) {
                                    echo do_shortcode($kalkulator);
                                }else {
                                    echo "<h3>Калькулятор находится в разработке!</h3>";
                                }
                                ?>
                            </li>

                        </ul>
                    <?php elseif ($term_list[0] === 'Каменные'): ?>


                        <!-- НАЧАЛО КОМПЛЕКТАЦИИ ДЛЯ КОМПЬЮТЕРА -->
                        <div class="kompliktaciya_desctop">
                            <div class="project_information_name">
                                <h1 class="name_house"><?php echo $information['проект'] ?>  <br> <?php echo get_the_title(); ?></h1>
                                <h2 class="name_house_dop">Каменный дом</h2>
                            </div>


                            <div class="bundling_tabs_wrapper">
                                <ul data-uk-switcher="{connect:'#kamen_komplekt'}" class="bundling_tabs">
                                    <li><a href="#">Теплый контур</a></li>
                                    <!-- <li><a href="#">Калькулятор</a></li> -->
                                </ul>
                                <ul id="kamen_komplekt" class="uk-switcher bundling_tabs_info_wrapper">
                                    <li>
                                        <div class="bundling_tabs_info_wrapper_inner">
                                            <div class="bundling_top_line_info">
                                                <h4 class="bundling_name">Что входит в комплектацию "Теплый контур"?</h4>
                                                <h3 class="bundling_price">Цена <?php echo $komplekt['теплый_контур'] ?> млн. руб.</h3>
                                            </div>
                                            <div class="bundling_description_wrapper">
                                                <div class="bundling_description_item">
                                                    <?php
                                                    foreach($data as $key => $value){
                                                        echo "<p>".$value['тело_комплектации']. "</p>";
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!--  <li>
                                       <h2>Калькулятор</h2>
                                   </li> -->
                               </ul>
                           </div>

                       </div>
                       <!-- КОНЕЦ КОМПЛЕКТАЦИИ ДЛЯ КОМПЬЮТЕРА -->


                       <!-- НАЧАЛО КОМПЛЕКТАЦИИ ДЛЯ КОМПЬЮТЕРА -->
                        <div class="kompliktaciya_mobile">
                            <div class="project_information_name">
                                <h1 class="name_house"><?php echo $information['проект'] ?>  <br> <?php echo get_the_title(); ?></h1>
                                <h2 class="name_house_dop">Каменный дом</h2>
                            </div>


                            <div class="bundling_tabs_wrapper">
                                <ul data-uk-switcher="{connect:'#kamen_komplekt'}" class="bundling_tabs">
                                    <li><a href="#">Комплектация теплый контур</a></li>
                                    <!-- <li><a href="#">Калькулятор</a></li> -->
                                </ul>
                                <ul id="kamen_komplekt" class="uk-switcher bundling_tabs_info_wrapper">
                                    <li>
                                        <div class="bundling_tabs_info_wrapper_inner">
                                            <div class="bundling_top_line_info">
                                                <h3 class="bundling_price">Cтоимость комплектации <br><?php echo $komplekt['теплый_контур'] ?> млн. руб.</h3>
                                            </div>
                                            <div class="bundling_description_wrapper">
                                                <div class="bundling_description_item">
                                                    <?php
                                                    foreach($data as $key => $value){
                                                        echo "<p>".$value['тело_комплектации']. "</p>";
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!--  <li>
                                       <h2>Калькулятор</h2>
                                   </li> -->
                                </ul>
                            </div>

                        </div>
                        <!-- КОНЕЦ КОМПЛЕКТАЦИИ ДЛЯ КОМПЬЮТЕРА -->




                    <?php elseif ($term_list[0] === 'Бани'): ?>
                    <!-- НАЧАЛО КОМПЛЕКТАЦИИ ДЛЯ КОМПЬЮТЕРА -->
                    <div class="kompliktaciya_desctop">
                        <div class="project_information_name">
                            <h1 class="name_house"><?php echo $information['проект'] ?> <br> <?php echo get_the_title(); ?></h1>
                            <h2 class="name_house_dop">Баня</h2>
                        </div>


                        <div class="bundling_tabs_wrapper">
                            <ul data-uk-switcher="{connect:'#kamen_komplekt'}" class="bundling_tabs">
                                <li><a href="#">Стандарт</a></li>
                                <!-- <li><a href="#">Калькулятор</a></li> -->
                            </ul>
                            <ul id="kamen_komplekt" class="uk-switcher bundling_tabs_info_wrapper">
                                <li>
                                    <div class="bundling_tabs_info_wrapper_inner">
                                        <div class="bundling_top_line_info">
                                            <h4 class="bundling_name">Что входит в комплектацию?</h4>
                                            <h3 class="bundling_price">Цена <?php echo $komplekt['стандарт'] ?> млн. руб.</h3>
                                        </div>
                                        <div class="bundling_description_wrapper">
                                            <div class="bundling_description_item">
                                                <?php
                                                foreach($data as $key => $value){
                                                    echo "<p>".$value['тело_комплектации']. "</p>";
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!--  <li>
                                   <h2>Калькулятор</h2>
                               </li> -->
                            </ul>
                        </div>

                    </div>
                    <!-- КОНЕЦ КОМПЛЕКТАЦИИ ДЛЯ КОМПЬЮТЕРА -->

                    <!-- НАЧАЛО КОМПЛЕКТАЦИИ ДЛЯ КОМПЬЮТЕРА -->
                        <div class="kompliktaciya_mobile">
                            <div class="project_information_name">
                                <h1 class="name_house"><?php echo $information['проект'] ?> <br> <?php echo get_the_title(); ?></h1>
                                <h2 class="name_house_dop">Баня</h2>
                            </div>


                            <div class="bundling_tabs_wrapper">
                                <ul data-uk-switcher="{connect:'#kamen_komplekt'}" class="bundling_tabs">
                                    <li><a href="#">Стандарт</a></li>
                                    <!-- <li><a href="#">Калькулятор</a></li> -->
                                </ul>
                                <ul id="kamen_komplekt" class="uk-switcher bundling_tabs_info_wrapper">
                                    <li>
                                        <div class="bundling_tabs_info_wrapper_inner">
                                            <div class="bundling_top_line_info">
                                                <h4 class="bundling_name">Что входит в комплектацию?</h4>
                                                <h3 class="bundling_price">Цена <?php echo $komplekt['стандарт'] ?> млн. руб.</h3>
                                            </div>
                                            <div class="bundling_description_wrapper">
                                                <div class="bundling_description_item">
                                                    <?php
                                                    foreach($data as $key => $value){
                                                        echo "<p>".$value['тело_комплектации']. "</p>";
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!--  <li>
                                       <h2>Калькулятор</h2>
                                   </li> -->
                                </ul>
                            </div>

                        </div>
                        <!-- КОНЕЦ КОМПЛЕКТАЦИИ ДЛЯ КОМПЬЮТЕРА -->


                    <?php elseif($term_list[0] === 'Брусовые'): ?>

                        <div class="kompliktaciya_desctop">
                            <div class="project_information_name">
                                <h1 class="name_house"><?php echo $information['проект'] ?> <br> <?php echo get_the_title(); ?></h1>
                                <h2 class="name_house_dop">Дом из клееного бруса</h2>
                            </div>

                            <div uk-sticky="offset: 0; top: 70; bottom: #secial; animation: uk-animation-slide-top;" class="project_information_content_wrapper">
                                <div class="project_information_content_row">
                                    <div class="project_information_content_col_name">
                                        <div class="project_information_content">
                                            <h3 class="project_information_content_heading">Наименование</h3>
                                        </div>
                                    </div>
                                    <div class="project_information_content_col_name">
                                        <div class="project_information_content">
                                            <h3>Эконом</h3>
                                            <?php if ($komplekt['эконом']) : ?>
                                                <span> <?php echo $komplekt['эконом'] ?> млн. руб</span>
                                            <?php else : ?>
                                                <span>Уточняйте у менеджера</span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="project_information_content_col_name">
                                        <div class="project_information_content">
                                            <h3>Стандарт</h3>
                                            <?php if ($komplekt['стандарт']) : ?>
                                                <span> <?php echo $komplekt['стандарт'] ?> млн. руб</span>
                                            <?php else : ?>
                                                <span>Уточняйте у менеджера</span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="project_information_content_col_name">
                                        <div class="project_information_content">
                                            <h3>Премиум</h3>
                                            <?php if ($komplekt['премиум']) : ?>
                                                <span> <?php echo $komplekt['премиум'] ?> млн. руб</span>
                                            <?php else : ?>
                                                <span>Уточняйте у менеджера</span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php

                            foreach ($data as $key => $value) :

                                ?>

                                <div class="project_information_content_name">
                                    <h3 class="heading"><?php echo $value['название_категории'] ?></h3>
                                </div>


                                <div class="project_information_content_wrapper">
                                    <?php for ($l = 0; $l < count($value['тело_категории']); $l++) : ?>
                                        <div class="project_information_content_row">

                                            <div class="project_information_content_col">
                                                <div class="project_information_content">
                                                    <p><?php echo $value['тело_категории'][$l]['название'] ?></p>
                                                </div>
                                            </div>
                                            <div class="project_information_content_col">
                                                <div class="project_information_content"><span><?php echo $value['тело_категории'][$l]['базовая'] ?></span></div>
                                            </div>
                                            <div class="project_information_content_col">
                                                <div class="project_information_content"><span><?php echo $value['тело_категории'][$l]['стандарт'] ?></span></div>
                                            </div>
                                            <div class="project_information_content_col">
                                                <div class="project_information_content"><span><?php echo $value['тело_категории'][$l]['премиум'] ?></span></div>
                                            </div>
                                        </div>
                                    <?php endfor ?>
                                </div>

                            <?php endforeach; ?>
                            <div id="secial"> </div>
                        </div>

                        <div class="kompliktaciya_mobile">

                            <div class="project_information_name">
                                <h1 class="name_house"><?php echo $information['проект'] ?> <br> <?php echo get_the_title(); ?></h1>
                                <h2 class="name_house_dop">Каркасный дом</h2>
                            </div>

                            <ul uk-accordion="">
                                <?php foreach ($komplekt_type as $item): ?>
                                    <li class="">
                                        <a href="" class="uk-accordion-title">
                                            <?php echo  str_replace('_', ' ', $item); ?>
                                            <span>
                                        <?php if ($komplekt[$item]) : ?>
                                            <span> <?php echo $komplekt[$item] ?> млн. руб</span>
                                        <?php else : ?>
                                            <span>Уточняйте у менеджера</span>
                                        <?php endif; ?>
                                    </span>
                                        </a>
                                        <div class="uk-accordion-content">
                                            <?php
                                            $count = array();
                                            foreach ($data as $value) {
                                                echo '<h3 class="heading">'. $value['название_категории'].'</h3>';
                                                $options = $value['тело_категории'];

                                                $name = array();

                                                for($i = 0; $i < count($options); $i++) {

                                                    if($options[$i][$item] == '+') {
                                                        $name[] = $options[$i]['название'];
                                                    }

                                                }

                                                if(!empty($name)) {
                                                    foreach ($name as $k => $v) {
                                                        echo "<p>- ". $v. "</p>";
                                                    }
                                                }else {
                                                    echo "<p> Не предусмотренно в комплектации</p>";
                                                }
                                            }
                                            ?>
                                        </div>
                                    </li>
                                <?php endforeach; ?>


                            </ul>
                        </div>

                        <?php else: ?>
                            <p>Выберете комплектацию!</p>
                        <?php endif; ?>





                    <!-- НАЧАЛО ПЛАН ЭТАЖЕЙ ДЛМА -->
                    <div class="layouts">
                        <h2 class="layouts_heading">Планировка <br> <span> дома </span></h2>
                        <div class="layouts_wrapper">
                            <div class="layouts_wrapper_inner">
                                <div uk-lightbox="animation: slide" class="layouts_lightbox">
                                    <div><a href="<?php echo $plan['изображение_первого_этажа']['url'] ?>" data-caption="План первого этажа дома Викинг" class="uk-inline"><img src="<?php echo $plan['изображение_первого_этажа']['sizes']['plan_img'] ?>" /></a></div>
                                </div>
                                <div class="layouts_content">
                                    <h4>Первый этаж</h4><span>План-схема первого этажа</span>
                                    <div class="squer_info"><span>Площадь</span>
                                        <h3><?php echo $plan['площадь_первого_этажа'] ?> кв.м.</h3>
                                    </div>
                                </div>
                            </div>
                            <?php if($plan['изображение_второго_этажа']['url']): ?>
                            <div class="layouts_wrapper_inner">
                                <div uk-lightbox="animation: slide" class="layouts_lightbox">
                                    <div><a href="<?php echo $plan['изображение_второго_этажа']['url'] ?>" data-caption="План первого этажа дома Викинг" class="uk-inline"><img src="<?php echo $plan['изображение_второго_этажа']['sizes']['plan_img'] ?>" /></a></div>
                                </div>
                                <div class="layouts_content">
                                    <h4>Второй этаж</h4><span>План-схема второго этажа</span>
                                    <div class="squer_info"><span>Площадь</span>
                                        <h3><?php echo $plan['площадь_второго_этажа'] ?> кв.м.</h3>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- КОНЕЦ ПЛАН ЭТАЖЕЙ ДЛМА -->


                </div>
                <!-- КОНЕЦ КОМПЛЕКТАЦИИ (ОБЕРТКА) -->
            </div>
        </div>
    </div>
    <!-- КОНЕЦ КОНТЕЙНЕРА -->

</div>

<div class="project_description">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="description_content">
                    <h2>Особенности<br> <span> проекта</span></h2>
                    <div class="description_content_features" style="margin-bottom: 30px">
                        <?php foreach($project_feature as $item => $value): ?>
                            <p> - <?php echo $value['особенности_проекта_тело']?></p>
                        <?php endforeach; ?>
                    </div>
                    <h2>Конструктивные <br> <span> особенности </span></h2>
                    <div class="description_content_features">
                        <?php foreach($construct_feature as $item => $value): ?>
                            <p> - <?php echo $value['конструктивные_особенности_тело']?></p>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="description_content_descr">
                    <h2>Описание проекта <br> <span> <?php echo $information['проект'] ?> <?php echo get_the_title(); ?> </span></h2>
                    <div class="project_description_inner">
                        <?php
                        the_post();
                        the_content();
                        ?>
                    </div>
                </div>


                <div class="layout_change">
                    <h2>Не устраивает планировка? <br> <span> Есть решение! </span></h2>
                    <p>Это совсем просто! В нашей компании работает штат опытных архитекторов, которые на основании ваших идей создадут индивидуальные планировки, внесут корректировки в фасад. Архитектор может встретиться с вами, как в одном из наших офисов, так и в любом другом удобном для вас месте, в том числе на участке.</p><a href="#modal-project_house" uk-toggle="" class="button button_accent">Я хочу изменить планировку дома</a>
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
</div>

<?php get_footer(); ?>