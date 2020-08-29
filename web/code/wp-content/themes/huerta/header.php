<!DOCTYPE html>
<html lang="en">

<head>
  <title><?php echo wp_get_document_title(); ?></title>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <?php wp_head(); ?>

  <!-- Google Analytics -->
  <?php global $url, $staging_sites; ?>
  <?php if (!strpos_array($url, $staging_sites)) : // exclude GA from staging site 
  ?>
    <script>
      (function(i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function() {
          (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
          m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
      })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

      ga('create', 'UA-XXXXX-Y', 'auto');
      ga('send', 'pageview');
    </script>
  <?php endif; ?>
  <!-- End Google Analytics -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/js/swiper.min.js"></script>

</head>

<body id="<?php echo $pagename; ?>" <?php body_class(); ?>>
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
            <div class="c-logo__image">
              <?php echo '<img src="' . $theme_logo_URL . '" alt="' . $logo_alt . '">'; ?>
            </div>
          </a>
        </div>
        <div class="o-grid__col u-8/12@md u-6/12">
          <nav class="c-nav">
            <button class="c-nav__btn js-toggle" aria-expanded="false">
              <span class="c-nav__burger"><span class="u-visually-hidden">Menu</span></span>
            </button>
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
  <main>