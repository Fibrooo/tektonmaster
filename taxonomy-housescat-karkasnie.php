<?php get_header();

?>


<?php

if($_GET['room'] || $_GET['bathroom'] || $_GET['square']):

    $args = array(
        'tax_query' => array(
            array(
                'taxonomy' => 'housescat',
                'field'=> 'id',
                'terms' => 3,
            )
        ),
        'paged' => get_query_var('paged') ?: 1,
        'posts_per_page' => '100',

        'meta_query' => array(
            'relation' => 'AND',
            array(
                'key'     => 'информация_о_доме_сколько_комнат',
                'value' => $_GET['room'] ?: array(1,2,3,4,5),
                'type' => 'NUMERIC',
            ),

            array(
                'key'     => 'информация_о_доме_сколько_ванн',
                'value' => $_GET['bathroom'] ?: array(1,2,3,4,5),
                'type' => 'NUMERIC',
            ),
            array(
                'key'     => 'информация_о_доме_сколько_площадь',
                'value' => $_GET['square'],
                'type' => 'NUMERIC',
                'compare' => $_GET['square'] == 100 ? "<" : ">",
            ),
        ),

    );

/*
 * создаем новый объект
 */
$q = new WP_Query($args);

?>



<div class="houses_category">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <div class="project_heading">
                    <h1>Строительство каркасных домов "под ключ"</h1>
                    <h2>В этом разделе собраны типовые проекты <strong>каркасных домов</strong>.</h2>
                </div>

            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form action="/tektonmaster.ls/housescat/karkasnie/" method="get" class="house_filter">
                    <button type="submit" class="button__normal">Найти</button>

                    <div class="group">
                        <label for="rooms">Сколько комнат</label>
                        <select name="room" id="rooms">
                            <option value="">Все варианты</option>
                            <option value="1" <?php if(isset($_GET['room']) && $_GET['room'] == 1) echo "selected=\"selected\""?>>1</option>
                            <option value="2" <?php if(isset($_GET['room']) && $_GET['room'] == 2) echo "selected=\"selected\""?>>2</option>
                            <option value="3" <?php if(isset($_GET['room']) && $_GET['room'] == 3) echo "selected=\"selected\""?>>3</option>
                            <option value="4" <?php if(isset($_GET['room']) && $_GET['room'] == 4) echo "selected=\"selected\""?>>4</option>
                        </select>
                    </div>

                    <div class="group">
                        <label for="bathrooms">Сколько ванных комнат</label>
                        <select name="bathroom" id="bathrooms">
                            <option value="">Все варианты</option>
                            <option value="1" <?php if(isset($_GET['bathroom']) && $_GET['bathroom'] == 1) echo "selected=\"selected\""?> >1</option>
                            <option value="2" <?php if(isset($_GET['bathroom']) && $_GET['bathroom'] == 2) echo "selected=\"selected\""?>>2</option>
                            <option value="3" <?php if(isset($_GET['bathroom']) && $_GET['bathroom'] == 3) echo "selected=\"selected\""?>>3</option>
                            <option value="4" <?php if(isset($_GET['bathroom']) && $_GET['bathroom'] == 4) echo "selected=\"selected\""?>>4</option>
                        </select>
                    </div>
                    <div class="group">
                        <label for="squares">Сортировать</label>
                        <select name="square" id="squares">
                            <option value="">Не выбрано</option>
                            <option value="100" <?php if(isset($_GET['square']) && $_GET['square'] == 100) echo "selected=\"selected\""?>>Меньше 100 кв.м.</option>
                            <option value="101" <?php if(isset($_GET['square']) && $_GET['square'] == 101) echo "selected=\"selected\""?>>Больше 100 кв.м.</option>
                        </select>
                    </div>

                </form>


            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">

            <?php if ( $q->have_posts() ) : while ( $q->have_posts() ) : $q->the_post(); ?>
                <!-- Цикл WordPress -->
                <?php



                $data_img = get_field('слайдер', get_the_ID());
                $data_price = get_field('комплектации', get_the_ID());
                $data_info = get_field('информация_о_доме', get_the_ID());
                $data_square = get_field('планировка', get_the_ID());

                /* echo "<pre>";
                 print_r();
                 echo "</pre>";*/

                ?>
                <div class="col-lg-6">
                    <div class="houses_category_item">
                        <a href="<?php the_permalink()?>">
                            <img src="<?php echo $data_img[0]['изображение'][0]['sizes']['slider_img']?>" alt="<?php the_title() ?>">
                        </a>
                        <div class="houses_category_item_info">
                            <a href="<?php the_permalink()?>"><?php the_title()?></a>
                            <p>От <?php echo $data_price['несущий_каркас']?> млн. руб.</p>
                        </div>
                        <div class="houses_category_item_dopinfo">
                            <div class="houses_category_item_dopinfo_item">
                                <img src="<?php echo get_template_directory_uri() ?>/assets/img/bed.png" alt="">
                                <div class="houses_category_item_dopinfo_item_descr">
                                    <p>Спален : </p>
                                    <span><?php echo $data_info['сколько_комнат']?></span>
                                </div>
                            </div>
                            <div class="houses_category_item_dopinfo_item">
                                <img src="<?php echo get_template_directory_uri() ?>/assets/img/bathtub.png" alt="">
                                <div class="houses_category_item_dopinfo_item_descr">
                                    <p>Ванных комнат :</p>
                                    <span><?php echo $data_info['сколько_ванн']?></span>
                                </div>
                            </div>

                            <div class="houses_category_item_dopinfo_item">
                                <img src="<?php echo get_template_directory_uri() ?>/assets/img/square.png" alt="">
                                <div class="houses_category_item_dopinfo_item_descr">
                                    <p>Общая площадь : </p>
                                    <?php  if($data_square['площадь_второго_этажа']): ?>
                                        <span> <?php echo (int)$data_square['площадь_первого_этажа'] + (int)$data_square['площадь_второго_этажа']?> кв. м.</span>
                                    <?php else:?>
                                        <span> <?php echo (int)$data_square['площадь_первого_этажа'] ?> </span>
                                    <?php endif; ?>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>
            <?php endwhile; ?>

                <div class="col-lg-12">
                    <?php if (function_exists("pagination")) {
                        pagination($q->max_num_pages);
                    } ?>
                </div>

            <? else : ?>
                <p>Записей нет.</p>
            <?php endif; wp_reset_postdata(); ?>



        </div>
    </div>
</div>

<?php else: ?>

<div class="houses_category">

    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <div class="project_heading">
                    <h1>Строительство каркасных домов "под ключ"</h1>
                    <h2>В этом разделе собраны типовые проекты <strong>каркасных домов</strong>.</h2>
                </div>

            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form action="/tektonmaster.ls/housescat/karkasnie/" class="house_filter">

                    <button type="submit" class="button__normal">Найти</button>

                    <div class="group">
                        <label for="rooms">Сколько комнат</label>
                        <select name="room" id="rooms">
                            <option value="">Все варианты</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>

                    <div class="group">
                        <label for="bathrooms">Сколько ванных комнат</label>
                        <select name="bathroom" id="bathrooms">
                            <option value="">Все варианты</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>

                    <div class="group">
                        <label for="squares">Сортировать</label>
                        <select name="square" id="squares">
                            <option value="">Не выбрано</option>
                            <option value="100">Меньше 100 кв.м.</option>
                            <option value="101">Больше 100 кв.м.</option>
                        </select>
                    </div>
                </form>


            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <!-- Цикл WordPress -->
                <?php

                $data_img = get_field('слайдер', get_the_ID());
                $data_price = get_field('комплектации', get_the_ID());
                $data_info = get_field('информация_о_доме', get_the_ID());
                $data_square = get_field('планировка', get_the_ID());

                ?>
                <div class="col-lg-6">
                    <div class="houses_category_item">
                        <a href="<?php the_permalink()?>">
                            <img src="<?php echo $data_img[0]['изображение'][0]['sizes']['slider_img']?>" alt="<?php the_title() ?>">
                        </a>
                        <div class="houses_category_item_info">
                            <a href="<?php the_permalink()?>"><?php the_title()?></a>
                            <p>От <?php echo $data_price['несущий_каркас']?> млн. руб.</p>
                        </div>
                        <div class="houses_category_item_dopinfo">
                            <div class="houses_category_item_dopinfo_item">
                                <img src="<?php echo get_template_directory_uri() ?>/assets/img/bed.png" alt="">
                                <div class="houses_category_item_dopinfo_item_descr">
                                    <p>Спален : </p>
                                    <span><?php echo $data_info['сколько_комнат']?></span>
                                </div>
                            </div>
                            <div class="houses_category_item_dopinfo_item">
                                <img src="<?php echo get_template_directory_uri() ?>/assets/img/bathtub.png" alt="">
                                <div class="houses_category_item_dopinfo_item_descr">
                                    <p>Ванных комнат :</p>
                                    <span><?php echo $data_info['сколько_ванн']?></span>
                                </div>
                            </div>

                            <div class="houses_category_item_dopinfo_item">
                                <img src="<?php echo get_template_directory_uri() ?>/assets/img/square.png" alt="">
                                <div class="houses_category_item_dopinfo_item_descr">
                                    <p>Общая площадь : </p>
                                    <?php  if($data_square['площадь_второго_этажа']): ?>
                                        <span> <?php echo (int)$data_square['площадь_первого_этажа'] + (int)$data_square['площадь_второго_этажа']?> кв. м.</span>
                                    <?php else:?>
                                        <span> <?php echo (int)$data_square['площадь_первого_этажа'] ?> </span>
                                    <?php endif; ?>
                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="pagination">

                    </div>
                </div>
            <?php endwhile; else : ?>
                <p>Записей нет.</p>
            <?php endif; ?>
            <div class="col-lg-6">
                <div class="houses_widjet">
                    <h2>Не нашли подходящий проект дома?</h2>
                    <p>В нашей компании работает штат опытных архитекторов, которые на основании ваших идей создадут индивидуальные планировки, внесут корректировки в фасад. Архитектор может встретиться с вами, как в одном из наших офисов, так и в любом другом удобном для вас месте, в том числе на участке.</p>
                </div>
            </div>

            <div class="col-lg-12">
                <?php

                the_posts_pagination()

                ?>
            </div>



        </div>
    </div>
</div>

<?php endif; ?>


<?php get_footer(); ?>
