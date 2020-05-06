<?php include 'header.php'; ?>
		<div class="content">
			<ul class="repertory menu breadcrumb">
				<li><a href="<?php $plxShow->racine() ?>"><?php $plxShow->lang('HOME'); ?></a></li>
				<li><?php $plxShow->catName(); ?></li>
			</ul>
			<?php $plxShow->catDescription(); ?>
			<?php $plxShow->catThumbnail(FORMATS['catThumbnail']); ?>
<?php include 'posts.php'; ?>
			<p class="rss"><?php $plxShow->artFeed(true, $plxShow->catId()); ?></p>
		</div>
<?php include 'footer.php'; ?>
