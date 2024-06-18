<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vetbookeeping
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="stylesheet" href="https://use.typekit.net/kwk2asp.css">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text"
            href="#primary"><?php esc_html_e( 'Skip to content', 'vetbookeeping' ); ?></a>

        <header class="site-header header" id="site-header">
            <div class="outer-wrapper nav-wrapper">
                <a class="ivet-logo" href="/"> <svg viewBox="0 0 249 71" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M241.05 15.8887C236.7 15.8887 233.1 12.2912 233.1 7.94433C233.1 3.59743 236.7 0 241.05 0C245.4 0 249 3.59743 249 7.94433C249 12.2912 245.4 15.8887 241.05 15.8887ZM241.05 4.64668C239.25 4.64668 237.75 6.14561 237.75 7.94433C237.75 9.74304 239.25 11.242 241.05 11.242C242.85 11.242 244.35 9.74304 244.35 7.94433C244.35 6.14561 242.85 4.64668 241.05 4.64668Z"
                            fill="white"></path>
                        <path
                            d="M139.5 38.2223V30.278H140.55C148.05 30.278 149.7 27.5799 149.7 20.0852C149.7 16.4878 149.7 9.29296 144.6 9.29296C139.95 9.29296 139.35 14.3893 139.35 17.9867V20.0852H130.8V19.4857C130.8 9.44285 132.3 1.34863 144.3 1.34863C155.55 1.34863 158.25 8.99317 158.25 18.5863C158.25 24.7319 157.8 32.2266 150.75 34.3251V34.475C158.1 36.2737 159 43.3186 159 49.9139C159 60.7062 155.85 69.6998 143.7 69.6998C133.65 69.6998 129.6 64.0039 129.6 54.1109V52.0124H138V54.1109C138 57.8583 139.35 61.6056 143.55 61.6056C149.85 61.6056 149.85 53.5114 149.85 49.1645C149.85 43.4685 148.8 37.7726 141.9 38.0724H139.5V38.2223Z"
                            fill="white"></path>
                        <path
                            d="M189.3 2.09766L176.25 30.7272L176.4 30.8771C178.35 29.0784 180.45 27.8792 183.3 27.8792C194.4 27.8792 195 40.77 195 48.8643C195 59.2069 193.65 69.8493 180.6 69.8493C167.4 69.8493 166.2 57.558 166.2 47.2154C166.2 29.0784 172.2 17.9863 179.85 2.09766H189.3ZM180.75 35.8236C179.4 35.8236 175.2 35.3739 175.2 48.8643C175.2 52.6116 175.35 61.755 180.75 61.755C185.85 61.755 186 52.7615 186 48.8643C186 44.8171 186.15 35.8236 180.75 35.8236Z"
                            fill="white"></path>
                        <path
                            d="M232.2 35.5242C232.2 46.0167 232.95 69.6998 217.05 69.6998C201 69.6998 201.9 46.0167 201.9 35.5242C201.9 25.0317 201.15 1.34863 217.05 1.34863C233.1 1.34863 232.2 25.0317 232.2 35.5242ZM217.05 9.29296C210.9 9.29296 210.45 21.5842 210.6 35.5242C210.45 49.4643 210.9 61.7555 217.05 61.7555C223.2 61.7555 223.65 49.4643 223.5 35.5242C223.65 21.5842 223.2 9.29296 217.05 9.29296Z"
                            fill="white"></path>
                        <path d="M11.1 20.835H3.30005V69.9998H11.1V20.835Z" fill="white"></path>
                        <path
                            d="M42.7501 70.0001H34.2001L19.3501 1.19922H28.5001L38.4001 56.5097L48.4501 1.19922H57.6001L42.7501 70.0001Z"
                            fill="white"></path>
                        <path
                            d="M61.95 70.0001V1.19922H88.5V8.69387H70.2V31.7774H85.95V39.272H70.2V62.6553H88.5V70.15H61.95V70.0001Z"
                            fill="white"></path>
                        <path d="M113.4 8.69387V70.0001H105.15V8.69387H93.6001V1.19922H124.95V8.69387H113.4Z"
                            fill="white">
                        </path>
                        <path d="M4.8 10.4926H0V5.99579H4.8V1.19922H9.6V5.99579H14.4V10.4926H9.75V15.1393H4.8V10.4926Z"
                            fill="white"></path>
                    </svg></a>
                <nav id="site-navigation" class="main-navigation">
                    <button class="menu-toggle" aria-controls="primary-menu"
                        aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'vetbookeeping' ); ?></button>
                    <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'menu-1',
                                'menu_id'        => 'primary-menu',
                            )
                        );
                    ?>
                </nav><!-- #site-navigation -->
                <a class="teal-btn" href="/book-demo/">
                    <p>Book A Demo</p>
                </a>
            </div>
        </header><!-- #masthead -->