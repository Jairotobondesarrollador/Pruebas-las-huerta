<?php

global $acf_fields, $isPageBuilder;

if ($isPageBuilder) {
    $hero_slides  = get_sub_field('hero_slides');
} else {
    $acf_fields = get_fields();
    extract($acf_fields);
}

if ($hero_slides) {
    $slideCount = count($hero_slides);
?>
    <!-- Slider main container -->
    <div class="c-hero__swiper swiper-container">
        <button class="c-hero__swiper_button c-hero__swiper_button--left">
            <img src="<?php echo bloginfo('template_url') ?>/dist/img/left.svg" alt="Previous">
        </button>
        <button class="c-hero__swiper_button c-hero__swiper_button--right">
            <img src="<?php echo bloginfo('template_url') ?>/dist/img/right.svg" alt="Next">
        </button>
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <?php foreach ($hero_slides  as $slide) { ?>
                <div class="swiper-slide">
                    <div class="o-grid o-grid--flush u-justify--end">
                        <?php if ($slide['slide_heading'] || $slide['slide_copy']) { ?>
                            <div class="o-grid__col u-9/12@md">
                                <?php echo ($slide['slide_heading']) ? '<p class="c-hero__swiper_title">' . $slide['slide_heading'] . '</p>' : ''; ?>
                                <?php echo ($slide['slide_copy']) ? '<p class="c-hero__swiper_copy">' . $slide['slide_copy'] . '</p>' : ''; ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
        <a class="c-hero__button c-hero__button--icon" href="<?php echo $hero_contact_button['url'] ?>"><?php echo $hero_contact_button['title'] ?></a>
    </div>
<?php } ?>