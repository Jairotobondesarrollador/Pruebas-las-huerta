<?php

global $acf_fields, $isPageBuilder;

if ($isPageBuilder) {
    $split_content_image          = get_sub_field('split_content_image');
    $split_content_headline       = get_sub_field('split_content_headline');
    $split_content_video          = get_sub_field('split_content_video');
    $split_content_copy           = get_sub_field('split_content_copy');
} else {
    $acf_fields = get_fields();
    extract($acf_fields);
}

if ($split_content_headline || $split_content_copy || !empty($split_content_image)) { ?>
    <section id="acerca">
        <div class="c-attention">
            <div class="o-container">
                <div class="o-grid o-grid--center o-grid--middle o-grid--flush">
                    <div class="o-grid__col u-7/12@md">
                        <?php if ($split_content_headline) { ?>
                            <h1 class="c-attention__title"><?php echo $split_content_headline; ?></h1>
                            <?php if ($split_content_copy) { ?>
                                <div class="c-attention__copy">
                                    <?php echo $split_content_copy; ?>
                                </div>
                            <?php } ?>
                        <?php }
                        if (!empty($split_content_image)) { ?>
                            <?php if ('upload' == $split_content_video['video_options']) { ?>
                                <div class="c-attention__img js-video" data-video="upload" data-mp4="<?php echo $split_content_video['video_mp4']['url']; ?>" data-webm="<?php echo $split_content_video['video_webm']; ?>" data-ogg="<?php echo $split_content_video['video_ogg']; ?>">
                                    <img src="<?php echo $split_content_image['sizes']['medium_large']; ?>" alt="<?php echo $split_content_image['alt']; ?>">
                                </div>
                            <?php } elseif ('embed' == $split_content_video['video_options']) {
                                preg_match('/src="(.+?)"/', $split_content_video['video_embed'], $matches);
                                $src = $matches[1]; ?>
                                <div class="c-attention__img js-video" data-video="embed" data-url="<?php echo $src; ?>">
                                    <img src="<?php echo $split_content_image['sizes']['medium_large']; ?>" alt="<?php echo $split_content_image['alt']; ?>">
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>