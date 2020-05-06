<?php include 'header.php'; ?>
		<div class="content">
			<article class="article error">
				<header>
					<h2><?php $plxShow->lang('ERROR'); ?></h2>
				</header>
				<p>
<?php $plxShow->erreurMessage(); ?>
				</p>
			</article>
		</div>
<?php include 'footer.php'; ?>
