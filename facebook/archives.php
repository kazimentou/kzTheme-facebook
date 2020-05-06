<?php include 'header.php'; ?>
		<div class="content">
			<ul class="repertory menu breadcrumb">
				<li><a href="<?php $plxShow->racine() ?>"><?php $plxShow->lang('HOME'); ?></a></li>
				<li><?php $plxShow->lang('ARCHIVES'); echo plxDate::formatDate(str_pad($plxShow->plxMotor->cible, 12, '0'), ' : #month #num_year(4)'); ?></li>
			</ul>
<?php include 'posts.php'; ?>
			<p class="rss"><?php $plxShow->artFeed(true); ?></p>
		</div>
<?php include 'footer.php'; ?>
