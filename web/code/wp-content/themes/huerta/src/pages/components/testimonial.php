<?php

global $acf_fields, $isPageBuilder;

$testimonial_title          = get_sub_field('testimonial_title');
$testimonial_subtitle       = get_sub_field('testimonial_subtitle');
$testimonial_copy           = get_sub_field('testimonial_copy');
$testimonial_cta            = get_sub_field('testimonial_cta');

$testimonial_slides = get_sub_field('testimonials');

if ($testimonial_title || $testimonial_copy) { ?>
    <section id="testimonios">
        <div class="c-testimonials">
            <div class="o-container">
                <div class="o-grid o-grid--center o-grid--equal-height">
                    <div class="o-grid__col u-5/12@md">
                        <div>
                            <p class="c-testimonials__title">
                                <?php echo $testimonial_title ?>
                            </p>
                            <h1 class="c-testimonials__subtitle">
                                <?php echo $testimonial_subtitle ?>
                            </h1>
                            <p class="c-testimonials__copy">
                                <?php echo $testimonial_copy ?>
                            </p>
                            <?php if ($testimonial_title) : ?>
                                <a class="c-testimonials__cta" href="<?php echo  $testimonial_cta['url'] ?>"><?php echo  $testimonial_cta['title'] ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="o-grid__col u-5/12@md u-relative">
                        <div class="c-testimonials__bg"></div>
                        <div class="c-testimonials__swiper swiper-container">
                            <div class="swiper-wrapper">
                                <?php foreach ($testimonial_slides as $slide) { ?>
                                    <div class="swiper-slide">
                                        <div class="c-testimonials__box">
                                            <div class="c-testimonials__img">
                                                <img src="<?php echo $slide['testimonial_client_image']['url'] ?>" alt="$slide['testimonial_client_image']['title']">
                                            </div>
                                            <div class="c-testimonials__stars">
                                                <?php for ($i = 0; $i < 5; $i++) :
                                                    if ($i < (int) $slide['testimonial_client_rating']) : ?>
                                                        <span class="c-testimonials__star">
                                                        </span>
                                                    <?php else : ?>
                                                <?php
                                                    endif;
                                                endfor; ?>
                                            </div>
                                            <?php if ($slide['testimonial_client_name'] || $slide['testimonial_client_copy']) { ?>
                                                <?php echo ($slide['testimonial_client_name']) ? '<p class="c-testimonials__heading">' . $slide['testimonial_client_name'] . '</p>' : ''; ?>
                                                <?php echo ($slide['testimonial_client_copy']) ? '<p class="c-testimonials__review">' . $slide['testimonial_client_copy'] . '</p>' : ''; ?>

                                            <?php } ?>
                                        </div>
                                    </div>
                                <?php } ?>

                            </div>
                            <div class="c-testimonials__buttons">
                                <button class="c-testimonials__button c-testimonials__button--left">
                                    <img src="<?php echo bloginfo('template_url') ?>/dist/img/left-pink.svg" alt="Previous">
                                </button>
                                <button class="c-testimonials__button c-testimonials__button--right">
                                    <img src="<?php echo bloginfo('template_url') ?>/dist/img/right-pink.svg" alt="Next">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>