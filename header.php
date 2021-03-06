<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Lettra
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <title><?php wp_title('|', true, 'right');
          bloginfo('name') ?></title>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'lettra'); ?></a>

    <header id="masthead" class="site-header hide">
      <div class="site-header__wrapper">
        <div class="site-branding">
          <div class="site-branding__title">
            <!-- the title or logo -->
            <?php if (has_custom_logo()) : ?>
              <?php the_custom_logo(); ?>
            <?php else : ?>
              <?php if (is_front_page() && is_home()) : ?>
                <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
              <?php else : ?>
                <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
              <?php endif; ?>
            <?php endif; ?>
            <!-- the open button menu -->
            <div id="nav-button" class="site-title__nav">
              <div class="bar1"></div>
              <div class="bar2"></div>
              <div class="bar3"></div>
            </div>
          </div><!-- .site-branding__title -->

          <?php $lettra_description = get_bloginfo('description', 'display');
          if ($lettra_description || is_customize_preview()) :
            ?>
            <p class="site-description"><?php echo $lettra_description; /* WPCS: xss ok. */ ?></p>
          <?php endif; ?>
        </div><!-- .site-branding -->

        <nav id="site-navigation" class="main-navigation hide">
          <!-- <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><//?php esc_html_e('Primary Menu', 'lettra'); ?></button> -->
          <div class="main-navigation__wrapper">
            <?php
            wp_nav_menu(array(
              'container' => false,
              'theme_location' => 'menu-2',
              'menu_id'        => 'secondary-menu',
              'menu_class' => 'main-navigation__left'
            ));
            ?>
            <?php
            wp_nav_menu(array(
              'container' => false,
              'theme_location' => 'menu-1',
              'menu_id'        => 'primary-menu',
              'menu_class' => 'main-navigation__right'
            ));
            ?>
          </div><!-- #site-navigation__wrapper -->
        </nav><!-- #site-navigation -->
      </div><!-- #site-header__wrapper -->
    </header><!-- #masthead -->

    <div id="content" class="site-content">