<?php get_header() ?>
<?php

$data_info = get_field('информация');
$data_adm = get_field('администрация');

?>
<div class="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="second_heading"><?php the_title() ?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="about_wrapper">
                    <?php echo $data_info; ?>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="adm_wrapper">
                    <?php foreach ($data_adm as $item => $value): ?>
                    <div class="adm_item">
                        <img src="<?php echo $value['изображение']['url'] ?>" alt="">
                        <div class="adm_item_content">
                            <h3><?php echo $value['имя'] ?></h3>
                            <span><?php echo $value['подпись'] ?></span>
                            <p><?php echo $value['описание'] ?></p>
                        </div>
                    </div>

                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer() ?>
