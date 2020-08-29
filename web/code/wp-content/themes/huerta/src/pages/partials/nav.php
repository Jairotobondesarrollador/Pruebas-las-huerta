<?php // Navigation //

global $acf_fields;

$acf_fields = get_fields('options');
extract($acf_fields);

$logo_alt       = $header_logo['alt'];
$theme_logo_URL = $header_logo['sizes']['medium'];

?>

<header class="c-header navigation" role="banner">
  <div class="o-container u-12/12">
    <div class="o-grid o-grid--equal-height">
      <div class="o-grid__col u-4/12@md u-6/12">
        <a href="<?php echo site_url(); ?>" class="c-logo">
          <div class="c-header__logo">
            <?php echo '<img src="' . $theme_logo_URL . '" alt="' . $logo_alt . '">'; ?>
          </div>
        </a>
      </div>
      <div class="o-grid__col u-8/12@md u-6/12">
        <nav class="c-nav">
          <button class="c-nav__btn js-toggle" aria-expanded="false">
            <span class="c-nav__burger">
              <span class="u-visually-hidden c-nav__bg"></span>
            </span>
          </button>
          <div class="c-nav__"></div>
          <?php
          wp_nav_menu(array(
            'theme_location'   => 'header-menu',
            'container'         => 'div',
            'container_class'   => 'c-nav__menu-container',
            'menu_class'       => 'c-nav__menu js-menu',
            'menu_id'          => 'js-navigation-menu'
          ));
          ?>
        </nav>
      </div>
    </div>
  </div>
</header>