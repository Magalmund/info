<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(). '/style.css' ?>">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(). '/fonts/fontawesome/css/all.css' ?>">
    <script src="<?php echo get_stylesheet_directory_uri(). '/js/app.js' ?>" defer=""></script>
    <title> <?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title('');?></title>
    <?php wp_head(); ?>
</head>

<body>


