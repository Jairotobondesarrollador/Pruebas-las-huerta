      <?php

      global $acf_fields;

      $acf_fields = get_fields('options');
      extract($acf_fields);

      ?>

      <footer class="c-footer">
        <div class="c-footer__top">
          <img class="c-footer__logo" src="<?php echo $footer_logo['url'] ?>" alt="<?php echo $footer_logo['alt'] ?>">
          <?php
          wp_nav_menu(array(
            'theme_location'    => 'footer-top-menu',
            'container'          => 'div',
            'container_class'    => 'c-footer-menu',
            'menu_class'        => 'footer-menu'
          ));
          ?>
        </div>

        <div class="c-footer__bottom">
          <p><?php echo $footer_copyright ?></p>
          <p><?php echo $name ?></p>
          <?php
          wp_nav_menu(array(
            'theme_location'    => 'footer-bottom-menu',
            'container'          => 'div',
            'container_class'    => 'c-footer-menu',
            'menu_class'        => 'footer-menu'
          ));
          ?>
        </div>
        <?php wp_footer(); // do not remove 
        ?>
      </footer>
      </main>
      </body>

      </html>