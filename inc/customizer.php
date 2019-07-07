<?php

/**
 * Lettra Theme Customizer
 *
 * @package Lettra
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function lettra_customize_register($wp_customize)
{
  $wp_customize->get_setting('blogname')->transport         = 'postMessage';
  $wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
  $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

  /**
   * Custom settings for colors
   * Using WP's default 'colors' section
   */
  $wp_customize->add_setting('accent_color', array(
    'default' => 'hsl(192, 60%, 50%)',
    'transport'  => 'postMessage'
  ));

  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'accent_color',
      array(
        'label'      => __('Accent Color', 'lettra'),
        'mode' => 'hue',
        'section'    => 'colors',
        'settings'   => 'accent_color',
      )
    )
  );

  $wp_customize->add_setting('link_color', array(
    'default' => 'hsl(192, 60%, 50%)',
    'transport'  => 'postMessage'
  ));

  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'link_color',
      array(
        'label'      => __('Link Color', 'lettra'),
        'mode' => 'hue',
        'section'    => 'colors',
        'settings'   => 'link_color',
      )
    )
  );

  /**
   * Custom settings for fonts
   */
  $wp_customize->add_section(
    'font_options',
    array(
      'title'       => __('Font Options', 'lettra'), //Visible title of section
      'priority'    => 20, //Determines what order this appears in
      'capability'  => 'edit_theme_options', //Capability needed to tweak
      'description' => __('Choose font pairings for your theme here.', 'lettra'), //Descriptive tooltip
    )
  );

  $wp_customize->add_setting('title_font', array(
    'default'        => 'Roboto Slab',
    'capability'     => 'edit_theme_options',
    'transport'  => 'postMessage'
  ));

  $wp_customize->add_control('title_font_control', array(
    'label'      => __('Title Font', 'lettra'),
    'section'    => 'font_options',
    'settings'   => 'title_font',
    'type'       => 'select',
    'choices'    => array(
      'Roboto Slab, serif' => 'Roboto Slab',
      'Didot, Garamond, "Times New Roman", serif' => 'Didot',
      'American Typewriter, serif' => 'American Typewriter',
    ),
  ));

  $wp_customize->add_setting('body_font', array(
    'default'        => 'Lato',
    'capability'     => 'edit_theme_options',
    'transport'  => 'postMessage'
  ));

  $wp_customize->add_control('body_font_control', array(
    'label'      => __('Body Font', 'lettra'),
    'section'    => 'font_options',
    'settings'   => 'body_font',
    'type'       => 'select',
    'choices'    => array(
      'Lato, san-serif, Arial, sans-serif' => 'Lato',
      'Avenir, Arial, sans-serif' => 'Avenir',
      'Helvetica, Arial, sans-serif' => 'Helvetica',
    ),
  ));

  if (isset($wp_customize->selective_refresh)) {
    $wp_customize->selective_refresh->add_partial('blogname', array(
      'selector'        => '.site-title a',
      'render_callback' => 'lettra_customize_partial_blogname',
    ));
    $wp_customize->selective_refresh->add_partial('blogdescription', array(
      'selector'        => '.site-description',
      'render_callback' => 'lettra_customize_partial_blogdescription',
    ));
  }
}
add_action('customize_register', 'lettra_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function lettra_customize_partial_blogname()
{
  bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function lettra_customize_partial_blogdescription()
{
  bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function lettra_customize_preview_js()
{
  wp_enqueue_script('lettra-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), '20151215', true);
}
add_action('customize_preview_init', 'lettra_customize_preview_js');
