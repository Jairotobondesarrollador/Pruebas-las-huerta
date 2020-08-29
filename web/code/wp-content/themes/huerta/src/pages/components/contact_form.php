<?php

$contact_form  = get_sub_field('contact_form');
$contact_image  = get_sub_field('contact_image');

if ($contact_form || !empty($contact_image)) { ?>
    <section id="contacto">
        <div class="c-form c-form__contact">
            <div class="o-container">
                <div class="o-grid o-grid--center o-grid--middle">
                    <div class="o_grid__col u-3/12@md">
                        <img class="c-form__img" src="<?php echo $contact_image['url'] ?>" alt="<?php echo $contact_image['alt'] ?>" />
                    </div>
                    <div class="o_grid__col u-7/12@md">
                        <?php echo do_shortcode('[contact-form-7 id=' . $contact_form . ' title=""]') ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>