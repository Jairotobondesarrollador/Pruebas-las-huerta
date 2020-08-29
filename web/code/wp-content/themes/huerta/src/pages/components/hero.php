<?php
global $is_page_builder, $acf_fields;

$acf_fields = get_fields();
extract($acf_fields);

$heroImage = get_sub_field('hero_image');
$title = get_field('title');
$subtitle = get_field('subtitle');
$copy = get_field('copy');

$primary_button = get_field('primary_button');
$secondary_button = get_field('secondary_button');

?>


<section>
    <div class="c-hero" style="background-image: url('<?php echo $image; ?>')">
        <div class="o-container u-12/12">
            <div class="o-grid o-grid--middle">
                <div class="o-grid__col u-8/12@md">
                    <div class="c-hero__wrapper">
                        <h1 class="c-hero__title"><?php echo $title; ?></h1>
                        <h2 class="c-hero__subtitle"><?php echo $subtitle; ?></h2>
                        <p class="c-hero__copy"><?php echo $copy; ?></p>
                        <div class="c-hero__buttons">
                            <a class="c-hero__button" href="#agenda"><?php echo $primary_button; ?></a>
                            <a class="c-hero__button" href="#eventos"><?php echo $secondary_button; ?></a>
                        </div>
                    </div>
                </div>
                <div class="o-grid__col u-4/12@md">
                    <?php get_theme_component('hero_slider'); ?>
                </div>
            </div>
        </div>
    </div>
    <img class="c-hero__scroll" src="<?php echo bloginfo('template_url') ?>/dist/img/down.svg" alt="Scroll Down">
</section>