<?php get_header() ?>

<div class="blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="second_heading">Блог</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog_wrapper">
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <!-- Цикл WordPress -->
                        <div class="blog_item">
                            <a href="<?php echo get_the_permalink(get_the_ID()) ?>"> <?php echo the_post_thumbnail('blog_img') ?> </a>
                            <div class="blog_item_content">
                                <h2><?php the_title() ?></h2>
                                <div class="descr"><?php echo get_the_excerpt() ?></div>
                            </div>
                            <a href="<?php echo get_the_permalink(get_the_ID())?>" class="button__normal-light" >Читать далее</a>
                        </div>

                    <?php endwhile; else : ?>
                        <p>Записей нет.</p>
                    <?php endif; ?>
                </div>

                <div class="pagination">
                    <?php

                    the_posts_pagination()

                    ?>
                </div>

            </div>
        </div>
    </div>



</div>

<?php get_footer() ?>
