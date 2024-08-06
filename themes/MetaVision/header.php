<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta name="keywords" content="<?= get_bloginfo('name'); ?>">
    <meta name="author" content="<?= get_bloginfo('author'); ?>">
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>

</head>

<body <?php body_class('page-transition'); ?> >
<header id="mainHeader" class="text-primary z-2">
<?php get_template_part('template-parts/Layout/header');
 get_template_part('template-parts/search-form'); ?>
</header>
<main class="min-vh-100 <?= is_singular('product') ? 'bg-secondary' : ''; ?>">