/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

(function($) {
  // Site title and description.
  wp.customize('blogname', function(value) {
    value.bind(function(to) {
      $('.site-title a').text(to);
    });
  });
  wp.customize('blogdescription', function(value) {
    value.bind(function(to) {
      $('.site-description').text(to);
    });
  });

  wp.customize('title_font', function(value) {
    value.bind(function(to) {
      $('h1, h2, .site-title, .entry-title, .site-footer__title').css({
        'font-family': to
      });
    });
  });

  wp.customize('body_font', function(value) {
    value.bind(function(to) {
      $('body').css({
        'font-family': to
      });
    });
  });

  // Header text color.
  wp.customize('header_textcolor', function(value) {
    value.bind(function(to) {
      if ('blank' === to) {
        $('.site-title, .site-description').css({
          clip: 'rect(1px, 1px, 1px, 1px)',
          position: 'absolute'
        });
      } else {
        $('.site-title, .site-description').css({
          clip: 'auto',
          position: 'relative'
        });
        $('.site-title a, .site-description').css({
          color: to
        });
      }
    });
  });
})(jQuery);
