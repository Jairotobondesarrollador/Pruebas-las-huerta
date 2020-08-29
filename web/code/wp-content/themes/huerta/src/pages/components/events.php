<?php

$event_tabs  = get_sub_field('events');
$events_title = get_sub_field('events_title');
$events_subtitle = get_sub_field('events_subtitle');

if ($event_tabs) {
    $eventsCount = count($event_tabs);
    $all_events = []
?>


    <?php foreach ($event_tabs as $key => $slide) {
        array_push($all_events, (object)[
            'id' => $key,
            'title' => $slide['events_tab_title'],
            'start' => $slide['events_full_date']
        ]);
    }

    ?>

    <section id="eventos">
        <div class="js-all-events" data-events='<?php echo json_encode($all_events, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) ?>'></div>
        <div class="c-events">
            <div class="o-container o-container--small">
                <p class="c-events__title"><?php echo $events_title ?></p>
                <h1 class="c-events__subtitle"><?php echo $events_subtitle ?></h1>
                <div id="tabGroup-1" class="o-tabs js-tabs">
                    <div role="tablist" aria-label="Events">
                        <div class="o-grid o-grid--other">
                            <div class="o-grid__col u-12/12@md">
                                <div class="c-events__row">
                                    <?php foreach ($event_tabs as $key => $slide) { ?>
                                        <?php if ($key === 0) : ?>
                                            <button class="c-events__button c-events__button--primary js-tab-btn is-selected" role="tab" aria-selected="true" aria-controls="<?php echo strtolower(str_replace(" ", "-", $slide['events_tab_title'])) ?>-tab" id="<?php echo strtolower(str_replace(" ", "-", $slide['events_tab_title'])) ?>">
                                                <span class="js-checked"></span>
                                                <div class="c-events__flex">
                                                    <span class="c-events__heading"><?php echo $slide['events_tab_title'] ?></span>
                                                    <span class="c-events__time"><?php echo $slide['events_tab_duration'] ?></span>
                                                </div>
                                            </button>
                                        <?php else : ?>
                                            <button class="c-events__button c-events__button--primary js-tab-btn" role="tab" aria-selected="" aria-controls="<?php echo strtolower(str_replace(" ", "-", $slide['events_tab_title'])) ?>-tab" id="<?php echo strtolower(str_replace(" ", "-", $slide['events_tab_title'])) ?>">
                                                <span class="js-checked"></span>
                                                <div class="c-events__flex">
                                                    <span class="c-events__heading"><?php echo $slide['events_tab_title'] ?></span>
                                                    <span class="c-events__time"><?php echo $slide['events_tab_duration'] ?></span>
                                                </div>
                                            </button>
                                        <?php endif; ?>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="o-grid">
                        <div class="o-grid__col u-6/12@md">
                            <div id='calendar'></div>
                        </div>
                        <div class="o-grid__col u-6/12@md">
                            <?php foreach ($event_tabs as $key => $slide) { ?>
                                <div class="o-tabs__panel js-tab-panel <?php echo $key === 0 ? 'is-current' : '' ?>" tabindex="<?php echo $key === 0 ? '0' : '-1' ?>" role="tabpanel" id="<?php echo strtolower(str_replace(" ", "-", $slide['events_tab_title'])) ?>-tab" aria-labelledby="<?php echo strtolower(str_replace(" ", "-", $slide['events_tab_title'])) ?>">
                                    <p class="c-events__tab_title">Eventos - <?php echo $slide['events_tab_month']  ?></p>
                                    <p class="c-events__tab_subtitle"><?php echo $slide['events_tab_title'] ?></p>
                                    <div class="c-events__tab_copy">
                                        <?php echo $slide['events_tab_copy'] ?>
                                    </div>
                                    <div class="c-events__schedule">
                                        <span>Hora: <?php echo $slide['events_tab_time'] ?></span>
                                        <span>Aporte: <?php echo $slide['events_tab_price'] ?></span>
                                        <span>Por: <?php echo $slide['events_tab_author'] ?></span>
                                    </div>
                                    <div class="c-events__buttons">
                                        <a class="c-events__subscribe js-open-dialog-<?php echo $key ?>" href="<?php echo $slide['events_subscribe']['url'] ?>" aria-label="Open Dialog"> <?php echo $slide['events_subscribe']['title'] ?></a>
                                        <a class="c-events__phone" href="<?php echo $slide['events_subscribe']['phone'] ?>">
                                            <img src="<?php echo get_bloginfo('template_url') ?>/dist/img/phone.svg" alt="<?php echo $slide['events_subscribe']['url'] ?>" />
                                        </a>
                                    </div>
                                </div>
                                <?php if (strtolower($slide['events_tab_price']) === 'gratis') : ?>
                                    <div class="c-dialog js-dialog js-dialog-<?php echo $key ?>" role="dialog" aria-labelledby="dialogTitle" aria-describedby="dialogDescription" aria-hidden="true">
                                        <div class="c-form__bg c-form__bg--events" style="background-image: url('<?php echo get_bloginfo('template_url') ?>/dist/img/conversatorios-pop-up.png')">
                                            <button type="button" aria-label="Close Navigation" class="c-form__close js-close-dialog-<?php echo $key ?>">
                                                <img src="<?php echo get_bloginfo('template_url') ?>/dist/img/close-pink.svg" alt="">
                                            </button>
                                        </div>
                                        <form class="c-form c-form--default">
                                            <div class="c-form__body">
                                                <p class="c-form__title">Inscripción</p>
                                                <p class="c-form__subtitle">Completa este formulario para separar tu cupo</p>
                                                <div class="c-form--two">
                                                    <input type="text" name="nombre" placeholder="Nombre (*)" />
                                                    <input type="text" name="apellido" placeholder="Apellido (*)" />
                                                </div>
                                                <div class="c-form--three">
                                                    <input type="text" name="pais" placeholder="Pais" />
                                                    <input type="text" name="departamento" placeholder="Departamento/Provincia" />
                                                    <input type="text" name="ciudad" placeholder="Ciudad" />
                                                </div>
                                                <div class="c-form--two">
                                                    <input type="email" name="correo" placeholder="Correo electrónico (*)" />
                                                    <input type="tel" name="telefono" placeholder="Teléfono/Celular" />
                                                </div>
                                                <div class="c-form--one">
                                                    <input type="text" name="evento" placeholder="<?php echo $slide['events_tab_title'] ?>" value="<?php echo $slide['events_tab_title'] ?>" />
                                                </div>
                                                <div class="c-form--one">
                                                    <textarea name="informacion" placeholder="Información Adicional"></textarea>
                                                </div>
                                                <div class="c-form__links">
                                                    <a href="">Politicas de Privacidad</a>
                                                    <input type="submit" name="enviar" />
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="c-dialog__overlay js-dialog-overlay js-dialog-overlay-<?php echo $key ?>" aria-hidden="true"></div>
                                <?php else : ?>
                                    <div class="c-dialog js-dialog js-dialog-<?php echo $key ?>" role="dialog" aria-labelledby="dialogTitle" aria-describedby="dialogDescription" aria-hidden="true">
                                        <div class="c-form__bg c-form__bg--events" style="background-image: url('<?php echo get_bloginfo('template_url') ?>/dist/img/sofa.png')">
                                            <button type="button" aria-label="Close Navigation" class="c-form__close js-close-dialog-<?php echo $key ?>">
                                                <img src="<?php echo get_bloginfo('template_url') ?>/dist/img/close-white.svg" alt="">
                                            </button>
                                        </div>
                                        <form class="c-form c-form--price">
                                            <div class="c-form__body">
                                                <div class="c-form__flex">
                                                    <div>
                                                        <p class="c-form__title">Conversatorios</p>
                                                        <p class="c-form__subtitle">Completa este formulario para agendas tu cita</p>
                                                    </div>
                                                    <p class="c-form__price">
                                                        COP$ <?php echo $slide['events_tab_price'] ?>
                                                    </p>
                                                </div>
                                                <div class="c-form--two">
                                                    <input type="text" name="nombre" placeholder="Nombres (*)" />
                                                    <input type="text" name="apellido" placeholder="Apellidos (*)" />
                                                </div>
                                                <div class="c-form--three">
                                                    <input type="text" name="pais" placeholder="Pais" />
                                                    <input type="text" name="departamento" placeholder="Departamento/Provincia" />
                                                    <input type="text" name="ciudad" placeholder="Ciudad" />
                                                </div>
                                                <div class="c-form--two">
                                                    <input type="email" name="correo" placeholder="Correo electrónico (*)" />
                                                    <input type="tel" name="telefono" placeholder="Teléfono/Celular" />
                                                </div>
                                                <div class="c-form--one">
                                                    <input type="text" name="evento" placeholder="<?php echo $slide['events_tab_title'] ?>" value="<?php echo $slide['events_tab_title'] ?>" />
                                                </div>

                                                <div class="c-form__links">
                                                    <a href="">Politicas de Privacidad</a>
                                                    <input type="submit" name="enviar" />
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="c-dialog__overlay js-dialog-overlay js-dialog-overlay-<?php echo $key ?>" aria-hidden="true"></div>
                                <?php endif; ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>