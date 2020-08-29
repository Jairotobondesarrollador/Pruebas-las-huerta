<?php // Accordions Component

global $is_page_builder;

if ($is_page_builder) {
  $accordions_top_content = get_sub_field('accordions_top_content');
  $accordions_image = get_sub_field('accordions_image');
  $accordion_cta = get_sub_field('accordions_cta');
} else {
  extract(get_fields());
}

$accordion = 1;

if (have_rows('accordions')) :

?>

  <section class="c-accordion" id="servicios">
    <div class="o-container">
      <div class="o-grid o-grid--center o-grid--other">
        <div class="o-grid__col u-5/12@md">
          <div id="accordionGroup-" class="js-accordion" data-active="0" data-single="true">
            <div class="c-wysiwyg">
              <?php echo $accordions_top_content; ?>
            </div>
            <ul aria-label="Accordion Control Group Buttons" class="c-accordion__controls">
              <?php while (have_rows('accordions')) : the_row();
                $title = get_sub_field('title');
                $content = get_sub_field('content');

                if ($title || $content) : ?>

                  <li>
                    <?php if ($title) : ?>
                      <button class="c-accordion__button" aria-controls="content-<?php echo $accordion; ?>" aria-expanded="false" id="accordion-control-<?php echo $accordion; ?>">
                        <span class="c-accordion__title c-heading"><?php echo $title; ?></span>
                      </button>
                    <?php endif;
                    if ($content) : ?>
                      <div aria-hidden="true" id="content-<?php echo $accordion; ?>" class="c-wysiwyg c-wysiwyg--accordion">
                        <?php echo $content; ?>
                      </div>
                    <?php endif; ?>
                  </li>

              <?php endif;
                $accordion++;
              endwhile; ?>
            </ul>
          </div>
          <a class="c-accordion__cta" href="<?php echo  $accordion_cta['url'] ?>"><?php echo  $accordion_cta['title'] ?></a>
        </div>
        <div class="o-grid__col u-4/12@md">
          <img src="<?php echo $accordions_image['url'] ?>" alt="<?php echo $accordions_image['title'] ?>">
        </div>
      </div>
    </div>
  </section>

<?php endif; ?>