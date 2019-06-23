<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Lettra
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer">
  <div class="site-footer__wrapper">
    <div id="footer-close-button" class="site-footer__close">x.</div>
    <div class="site-footer__widgets">
      <div class="site-footer__col-1">
        <?php if (is_active_sidebar('footer-col-1')) {
          dynamic_sidebar('footer-col-1');
        } ?>
      </div>
      <div class="site-footer__col-2">
        <?php if (is_active_sidebar('footer-col-2')) {
          dynamic_sidebar('footer-col-2');
        } ?>
      </div>
      <div class="site-footer__col-3">
        <?php if (is_active_sidebar('footer-col-3')) {
          dynamic_sidebar('footer-col-3');
        } ?>
      </div>
    </div>
    <!--.site-footer__widgets-->
    <div class="site-footer__credit">
      <a class="site-footer__credit__wp" href="<?php echo esc_url(__('https://wordpress.org/', 'lettra')); ?>">
        <?php
        /* translators: %s: CMS name, i.e. WordPress. */
        printf(esc_html__('Proudly powered by %s', 'lettra'), 'WordPress');
        ?>
      </a>
      <span class="site-footer__credit__sep"> | </span>
      <?php
      /* translators: 1: Theme name, 2: Theme author. */
      printf(esc_html__('Theme: %1$s by %2$s.', 'lettra'), 'Lettra', '<a class="site-footer__credit__author" href="http://underscores.me/"> Isabella Chen</a>');
      ?>
    </div><!-- .footer__credit -->
  </div><!-- .site-footer__wrapper -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>