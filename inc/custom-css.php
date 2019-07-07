<?php

function lettra_custom_css()
{
  $accent_hue = absint(get_theme_mod('accent_color', 195));
  $link_hue = absint(get_theme_mod('link_color', 195));
  $title_font = get_theme_mod('title_font');
  $body_font = get_theme_mod('body_font');
  $css = '
    body {
      font-family: ' . $body_font . ';
    }

    .entry-title,
    .entry-title a,
    .site-title,
    .site-title a {
      color: hsl(' . $accent_hue . ', 60%, 50%);
    }

    .site-title a:visited,
    .entry-title a:visited {
      color: hsl(' . $accent_hue . ', 40%, 40%);
    }
    
    .site-title a:hover,
    .entry-title a:hover {
      color: hsl(' . $accent_hue . ', 80%, 80%);
    }

    a {
      color: hsl(' . $link_hue . ', 60%, 50%);
    }

    a:visited {
      color: hsl(' . $link_hue . ', 40%, 40%);
    }

    a:hover {
      color: hsl(' . $link_hue . ', 80%, 80%);
    }

    h1,
    h2,
    .site-title,
    .entry-title,
    .site-footer__title {
      font-family: ' . $title_font . ';
    }
  ';
  return $css;
}
