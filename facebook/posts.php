<?php
/*
 * http://fr.gravatar.com/site/implement/images/
 * https://wiki.libravatar.org/api/
 *
 * https://alternativeto.net/software/gravatar/
 * */

while($plxShow->plxMotor->plxRecord_arts->loop()) {
	$author = $plxShow->artAuthor(false);
?>
			<article class="article" id="post-<?php echo $plxShow->artId(); ?>">
				<header>
					<div class="gravatar">
						<img src="<?= TEMPLATE ?>identicons/index.php?theme=cat&seed=<?= urlencode($author) ?>" />
					</div>
					<div>
						<h2><?php $plxShow->artTitle('link'); ?></h2>
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
				<div>
					<?php $plxShow->artThumbnail(); ?>
					<div>
<?php
	if($plxShow->mode() == 'article') {
		$plxShow->artContent();
	} else {
		$plxShow->artChapo('&#9654;&#9654;&#9654;'); /* &#9193; */
	}
?>
					</div>
				</div>
			</article>
<?php
	if($plxShow->mode() == 'article') {
		$plxShow->artAuthorInfos('<div class="author-infos">#art_authorinfos</div>');
		break; // sortie de boucle par sécurité
	}
} // Fin de boucle

if($plxShow->mode() == 'article') {
	include 'commentaires.php';
} else {
?>
			<nav class="pagination"><?php $plxShow->pagination(); ?></nav>
<?php
}
?>
