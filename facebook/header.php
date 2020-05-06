<?php

if (!defined('PLX_ROOT')) { exit; }

const FORMATS = array(
	'staticList'	=> '<li class="#static_class #static_status" id="#static_id"><a href="#static_url">#static_name</a></li>',
	'catList'		=> '<li id="#cat_id" class="#cat_status"><a href="#cat_url">#cat_name</a></li>',
	'lastArtList'	=> '<li><a href="#art_url">#art_title</a></li>',
	'tagList'		=> '<li class="tag #tag_size"><a class="#tag_status" href="#tag_url">#tag_name (#tag_count)</a></li>',
	'archList'		=> '<li id="#archives_id"><a class="#archives_status" href="#archives_url">#archives_name</a> (#archives_nbart)</li>',
	'catThumbnail'	=> '<div class="banner"><a href="#img_url"><img class="cat_thumbnail" src="#img_url" alt="#img_alt" title="#img_title" /></a></div>',
);
const BANNER = 'img/banner2.jpg';

// Hack against PluXml. Define TEMPLATE
ob_start();
$plxShow->template();
define('TEMPLATE', ob_get_clean() . '/');
?>
<!DOCTYPE html>
<html lang="<?php $plxShow->defaultLang() ?>">
<head>
	<meta charset="<?php $plxShow->charset('min'); ?>">
	<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0">
	<title><?php $plxShow->pageTitle(); ?></title>
<?php
	$plxShow->meta('description');
	$plxShow->meta('keywords');
	$plxShow->meta('author');
?>
	<link rel="icon" href="<?php $plxShow->template(); ?>/img/favicon.png" />
	<link rel="stylesheet" href="<?php $plxShow->template(); ?>/css/reboot.css" media="screen"/>
	<link rel="stylesheet" href="<?php $plxShow->template(); ?>/css/theme.css" media="screen"/>
<?php
	$plxShow->templateCss();
	$plxShow->pluginsCss();
?>
	<link rel="alternate" type="application/rss+xml" title="<?php $plxShow->lang('ARTICLES_RSS_FEEDS') ?>" href="<?php $plxShow->urlPostsRssFeed($plxShow->plxMotor->mode) ?>" />
	<link rel="alternate" type="application/rss+xml" title="<?php $plxShow->lang('COMMENTS_RSS_FEEDS') ?>" href="<?php $plxShow->urlRewrite('feed.php?rss/commentaires') ?>" />
</head>

<body id="top" class="page mode-<?php $plxShow->mode(true) ?>">
	<header class="header">
		<h1 class="logo"><?php $plxShow->mainTitle('link'); ?></h1>
		<h2><?php $plxShow->subTitle(); ?></h2>
		<nav class="nav responsive-menu">
			<label for="menu">&#9776;</label>
			<input type="checkbox" id="menu">
			<ul id="menu-list">
				<?php $plxShow->staticList($plxShow->getLang('HOME'), FORMATS['staticList']); ?>
				<!-- ?php $plxShow->pageBlog(); ? -->
				<li class="aside"><a href="#aside-start"><?php $plxShow->lang('TAGS'); ?></a></li>
				<li class="aside"><a href="#aside-end"><?php $plxShow->lang('LATEST_ARTICLES'); ?></a></li>
			</ul>
		</nav>
	</header>
	<main class="main">
