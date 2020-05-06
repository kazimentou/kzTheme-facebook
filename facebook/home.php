<?php include 'header.php'; ?>
		<div class="content">
<?php
if($plxShow->mode() != 'article' and file_exists(__DIR__ . '/' . BANNER)) {
?>
			<div class="banner">
				<img src="<?= TEMPLATE . BANNER ?>" />
			</div>
<?php
}
?>
<?php include 'posts.php'; ?>
			<p class="rss"><?php $plxShow->artFeed(true); ?></p>
		</div>
<?php include 'footer.php'; ?>
