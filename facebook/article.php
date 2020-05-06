<?php
include 'header.php';

$author = $plxShow->artAuthor(false);
?>
		<div class="content">
			<article class="article" id="post-<?php echo $plxShow->artId(); ?>">
				<header>
					<div class="gravatar">
						<img src="<?= TEMPLATE ?>identicons/index.php?theme=cat&seed=<?= urlencode($author) ?>" />
					</div>
					<div>
						<h2><?php $plxShow->artTitle(); ?></h2>
					</div>
					<div>
						<div class="art-date">
							<time datetime="<?php $plxShow->artDate('#num_year(4)-#num_month-#num_day'); ?>">
								<?php $plxShow->artDate('#num_day #month #num_year(4)'); ?>
							</time>
						</div>
						<div class="written-by">
							<?php $plxShow->lang('WRITTEN_BY'); ?> <span><?= $author ?></span>
						</div>
						<div class="art-nb-com">
							<?php $plxShow->artNbCom(); ?>
						</div>
					</div>
					<div>
						<div class="classified-in">
							<?php $plxShow->lang('CLASSIFIED_IN') ?> : <?php $plxShow->artCat() ?>
						</div>
						<div class="tags">
							<?php $plxShow->lang('TAGS') ?> : <?php $plxShow->artTags() ?>
						</div>
					</div>
				</header>
				<?php $plxShow->artThumbnail(); ?>
				<?php $plxShow->artContent(); ?>
			</article>
			<?php $plxShow->artAuthorInfos('<div class="author-infos">#art_authorinfos</div>'); ?>
<?php include 'comments.php'; ?>
		</div>
<?php include 'footer.php'; ?>
