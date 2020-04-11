<?php get_header() ?>


<div class="all_page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="second_heading"><?php the_title() ?></h1>
            </div>
            <div class="col-lg-12">
                <div class="all_page_wrapper">

                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <!-- Цикл WordPress -->
                        <div class="all_page_content">
                            <?php the_content() ?>
                        </div>
                    <?php endwhile; else : ?>
                        <p>Записей нет.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer() ?>
