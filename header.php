<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
   <meta name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no viewport-fit=cover">
    <link rel="apple-touch-favicon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="android-chrome-favicon" sizes="192x192" href="/android-chrome-192x192.png">
    <link rel="android-chrome-favicon" sizes="512x512" href="/android-chrome-512x512.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
  <?php wp_head() ?>
</head>
<body <?php body_class() ?> >



<header id="site-header" class="site-header">  
  <div class="shell">
    <div class="site-logo"><?php the_custom_logo(); ?></div>
      <?php if ( has_nav_menu( 'primary' ) ) : ?>
        <a href="#" class="btn-nav">
            <span></span>
          </a>
        <nav class="primary-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary menu', 'theme' ); ?>">
            <?php
            wp_nav_menu(
              array(
                'container' => false,
                'theme_location'  => 'primary',
                'menu_class'      => 'primary-menu',
                'items_wrap'      => '<ul id="primary-menu-list" class="%2$s">%3$s</ul>',
                'fallback_cb'     => false,
              )
            );
            ?>
        </nav>
      <?php endif; ?>
  </div>  
  
</header>


<h1>This is the header</h1>