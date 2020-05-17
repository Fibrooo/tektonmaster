<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Tektonmaster
 */

get_header();
?>

	<div class="single_post" ">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="article_wrapper">
                        <article>
                            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                                <!-- Цикл WordPress -->
                                <h2 class="second_heading"><?php the_title() ?></h2>

                                <div class="article_content">
                                    <?php the_content(); ?>
                                </div>
                            <?php endwhile; else : ?>
                                <p>Записей нет.</p>
                            <?php endif; ?>

                        </article>
                    </div>
                </div>
                <div class="col-lg-3">
                    test
                </div>
            </div>
        </div>
    </div>
<?php

get_footer();
