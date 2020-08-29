<?php
$image = get_sub_field('ad_image');
$title = get_sub_field('ad_title');
$subtitle = get_sub_field('ad_subtitle');
$copy = get_sub_field('ad_copy');
$link = get_sub_field('ad_link');

?>

<section id="ad">
    <div class="c-ad" style="background-image: url('<?php echo $image; ?>')">
        <div class="o-container">
            <div class="o-grid o-grid--center o-grid--middle">
                <div class="o-grid__col u-9/12@md">
                    <p class="c-ad__subtitle"><?php echo $title; ?></p>
                    <h1 class="c-ad__title"><?php echo $subtitle; ?></h1>
                    <p class="c-ad__copy"><?php echo $copy; ?></p>
                    <a class="c-ad__link" href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a>
                </div>
            </div>
        </div>
    </div>
</section>