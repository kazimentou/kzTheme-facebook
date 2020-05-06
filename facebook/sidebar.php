<?php

if(!defined('PLX_ROOT')) { exit; }

if(!empty('FULL_WIDTH')) {
?>
		<aside>
			<h3><?php $plxShow->lang('CATEGORIES'); ?></h3>
			<ul class="cat-list">
<?php $plxShow->catList(); ?>
			</ul>

			<h3><?php $plxShow->lang('TAGS'); ?></h3>
			<ul class="tag-list">
<?php $plxShow->tagList('<li class="tag #tag_size"><a class="#tag_status" href="#tag_url" title="#tag_name">#tag_name (#tag_count)</a></li>', 15); ?>
			</ul>

			<h3><?php $plxShow->lang('ARCHIVES'); ?></h3>
			<ul class="arch-list">
<?php $plxShow->archList('<li id="#archives_id"><a class="#archives_status" href="#archives_url" title="#archives_name">#archives_name</a> (#archives_nbart)</li>'); ?>
			</ul>
		</aside>

		<aside>
			<h3><?php $plxShow->lang('LATEST_ARTICLES'); ?></h3>
			<ul class="lastart-list">
<?php $plxShow->lastArtList(); ?>
			</ul>

			<h3><?php $plxShow->lang('LATEST_COMMENTS'); ?></h3>
			<ul class="lastcom-list">
<?php $plxShow->lastComList('<li><a href="#com_url">#com_author '.$plxShow->getLang('SAID').' : #com_content(34)</a></li>'); ?>
			</ul>

<?php
if(true or $plxShow->plxMotor->aConf['enable_rss']) {
?>
			<ul class="rss">
				<li><a href="<?php $plxShow->urlRewrite('feed.php?rss') ?>" title="<?php $plxShow->lang('ARTICLES_RSS_FEEDS'); ?>"><?php $plxShow->lang('ARTICLES'); ?></a></li>
				<li><a href="<?php $plxShow->urlRewrite('feed.php?rss/commentaires'); ?>" title="<?php $plxShow->lang('COMMENTS_RSS_FEEDS') ?>"><?php $plxShow->lang('COMMENTS'); ?></a></li>
			</ul>
<?php
}
?>
		</aside>
<?php
}
?>
