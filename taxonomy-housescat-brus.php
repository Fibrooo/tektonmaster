<?php get_header();
?>

<div class="houses_category">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <div class="project_heading">
                    <h1>Строительство домов из клееного "под ключ"</h1>
                    <h2>В этом разделе собраны типовые проекты <strong>брусовых домов</strong>.</h2>
                </div>

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
                /*  echo "<pre>";
                  print_r($data[0]['изображение'][0]['sizes']['slider_img']);
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
                                    <p>Спален: </p>
                                    <span><?php echo $data_info['сколько_комнат']?></span>
                                </div>
                            </div>
                            <div class="houses_category_item_dopinfo_item">
                                <img src="<?php echo get_template_directory_uri() ?>/assets/img/bathtub.png" alt="">
                                <div class="houses_category_item_dopinfo_item_descr">
                                    <p>Ванных комнат: </p>
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
            <?php endwhile; else : ?>
                <p>Записей нет.</p>
            <?php endif; ?>


        </div>
    </div>
</div>




<?php get_footer(); ?>
