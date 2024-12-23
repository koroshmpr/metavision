<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php
    $focus_keyword = get_post_meta(get_the_ID(), 'rank_math_focus_keyword', true);
    ?>
    <meta name="keywords" content="<?= $focus_keyword ??  get_bloginfo('name'); ?>">
    <meta name="author" content="<?= get_bloginfo('author'); ?>">
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
    <?php
    $scripts = get_field('header-scripts', 'option');
    echo $scripts ?? '';
    ?>
</head>

<body <?php body_class('page-transition'); ?>>
<?php
$bodyScripts = get_field('body-scripts', 'option');
echo $bodyScripts ?? ''; ?>
<header id="mainHeader" class="text-primary z-2">
    <?php get_template_part('template-parts/Layout/header');
    get_template_part('template-parts/search-form'); ?>
</header>
<main class="min-vh-100 <?= is_front_page() ? 'bg-secondary' : '' ;?> <?= is_singular('product') ? 'bg-secondary' : ''; ?>">