<?php
if (!defined('PLX_ROOT')) { exit; }

if(!empty('FULL_WIDTH')) {
?>
	<aside id="aside-start">
		<h3><?php $plxShow->lang('CATEGORIES'); ?></h3>
		<ul class="cat-list">
<?php $plxShow->catList('', FORMATS['catList']); ?>
		</ul>

		<h3><?php $plxShow->lang('TAGS'); ?></h3>
		<ul class="tag-list">
<?php $plxShow->tagList(FORMATS['tagList'], 15); ?>
		</ul>

		<input id="toggle-arch" type="checkbox" />
		<h3><label for="toggle-arch"><?php $plxShow->lang('ARCHIVES'); ?></label></h3>
		<ul class="arch-list">
<?php $plxShow->archList(FORMATS['archList']); ?>
		</ul>
	</aside>

	<aside id="aside-end">
		<h3><?php $plxShow->lang('LATEST_ARTICLES'); ?></h3>
		<ul class="lastart-list">
<?php $plxShow->lastArtList(FORMATS['lastArtList'], 5, ($plxShow->mode() == 'categorie') ? $plxShow->plxMotor->cible : ''); ?>
		</ul>

		<h3><?php $plxShow->lang('LATEST_COMMENTS'); ?></h3>
		<ul class="lastcom-list">
<?php $plxShow->lastComList('<li><a href="#com_url">#com_author ' . $plxShow->getLang('SAID') . ' : #com_content</a></li>'); ?>
		</ul>
<?php
if(true or $plxShow->plxMotor->aConf['enable_rss']) {
?>

		<ul class="rss-list">
			<li class="rss"><a href="<?php $plxShow->urlRewrite('feed.php?rss') ?>" title="<?php $plxShow->lang('ARTICLES_RSS_FEEDS'); ?>"><?php $plxShow->lang('ARTICLES'); ?></a></li>
			<li class="rss"><a href="<?php $plxShow->urlRewrite('feed.php?rss/commentaires'); ?>" title="<?php $plxShow->lang('COMMENTS_RSS_FEEDS') ?>"><?php $plxShow->lang('COMMENTS'); ?></a></li>
		</ul>
<?php
}
?>	</aside>
<?php
}
?>

	</main>
	<footer class="footer">
		<p>
			<?php $plxShow->mainTitle('link'); ?> - <span><?php $plxShow->subTitle(); ?></span> &copy; 2020
		</p>
		<p>
			<span>
				<?php $plxShow->lang('POWERED_BY') ?>&nbsp;<a href="<?= PLX_URL_REPO?>" title="<?php $plxShow->lang('PLUXML_DESCRIPTION') ?>">PluXml</a>
				<?php $plxShow->lang('IN') ?>&nbsp;<?php $plxShow->chrono(); ?>
				<?php $plxShow->httpEncoding() ?>
			</span> -
			<a rel="nofollow" href="<?php $plxShow->urlRewrite('core/admin/'); ?>" title="<?php $plxShow->lang('ADMINISTRATION') ?>"><?php $plxShow->lang('ADMINISTRATION') ?></a>
		</p>
		<p>
			<a id="up" href="#top" title="<?php $plxShow->lang('GOTO_TOP') ?>"><?php $plxShow->lang('TOP') ?></a>
		</p>
	</footer>
<script> <!-- Theme Facebook -->
	(function() {
		'use strict';
		document.getElementById('up').onclick = function(event) {
			event.preventDefault();
			document.getElementById('top').scrollIntoView({behavior: 'smooth'});
		}

		const menuList = document.getElementById('menu-list');
		if(menuList != null) {
			menuList.addEventListener('click', function(event) {
				if(event.target.tagName == 'A') {
					const el = event.target.href.match(/#(aside-\w+)$/);
					if(el != null) {
						event.preventDefault();
						document.getElementById('menu').checked = false;
						document.getElementById(el[1]).scrollIntoView({behavior: 'smooth'});
					}
				}
			})
		}
	})();
</script>
</body>
</html>
