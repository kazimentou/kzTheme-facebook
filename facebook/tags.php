<?php include 'header.php'; ?>
		<div class="content">
			<ul class="repertory menu breadcrumb">
				<li><a href="<?php $plxShow->racine() ?>"><?php $plxShow->lang('HOME'); ?></a></li>
				<li><?php $plxShow->tagName(); ?></li>
			</ul>
<?php include 'posts.php'; ?>
			<p class="rss"><?php $plxShow->tagFeed() ?></p>
		</div>
<?php include 'footer.php'; ?>
