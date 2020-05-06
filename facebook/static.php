<?php include 'header.php'; ?>
		<div class="content">
			<article class="article static" id="static-page-<?php echo $plxShow->staticId(); ?>">
				<header>
					<h2><?php $plxShow->staticTitle(); ?></h2>
				</header>
<?php $plxShow->staticContent(); ?>
			</article>
		</div>
<?php include 'footer.php'; ?>
