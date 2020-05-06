<?php
if(!defined('PLX_ROOT')) { exit; }

if($plxShow->plxMotor->plxRecord_coms) {
?>
		<div id="coms-list">
			<h3 id="comments">
				<?php echo $plxShow->artNbCom(); ?>
			</h3>
<?php
	while($plxShow->plxMotor->plxRecord_coms->loop()) { # On boucle sur les commentaires
		ob_start();
		$plxShow->comAuthor(false);
		$author = ob_get_clean();
?>
			<div id="<?php $plxShow->comId(); ?>" class="comment <?php $plxShow->comLevel(); ?>">
				<div class="gravatar">
					<img src="<?= TEMPLATE ?>identicons/index.php?theme=bird&seed=<?= urlencode($author) ?>" />
				</div>
				<div>
					<div id="com-<?php $plxShow->comIndex(); ?>">
						<a class="nbcom" href="<?php $plxShow->ComUrl(); ?>" title="#<?php echo $plxShow->plxMotor->plxRecord_coms->i+1 ?>">#<?php echo $plxShow->plxMotor->plxRecord_coms->i+1 ?></a>&nbsp;
						<time datetime="<?php $plxShow->comDate('#num_year(4)-#num_month-#num_day #hour:#minute'); ?>"><?php $plxShow->comDate('#day #num_day #month #num_year(4) - #hour:#minute'); ?></time> -
						<?php $plxShow->comAuthor('link'); ?>
						<?php $plxShow->lang('SAID'); ?> :
						<blockquote>
							<p class="content_com type-<?php $plxShow->comType(); ?>"><?php $plxShow->comContent(); ?></p>
						</blockquote>
					</div>
<?php
		if($plxShow->plxMotor->plxRecord_arts->f('allow_com') AND $plxShow->plxMotor->aConf['allow_com']) {
?>
					<p>
						<button type="button" data-com="<?php $plxShow->comIndex() ?>"><?php $plxShow->lang('REPLY'); ?></button>
					</p>
<?php
		}
 ?>
				</div>
			</div>
<?php
	} # Fin de la boucle sur les commentaires
?>
		</div>
<?php
}

if($plxShow->plxMotor->plxRecord_arts->f('allow_com') AND $plxShow->plxMotor->aConf['allow_com']) {
	# Les commentaires sont permis
?>
	<form id="frm-comment" method="post" class="comment" name="form1">
		<h3><?php $plxShow->lang('WRITE_A_COMMENT') ?></h3>
		<fieldset>
			<div>
				<input name="name" type="text" value="<?php $plxShow->comGet('name', ''); ?>" placeholder="<?php $plxShow->lang('NAME') ?>" maxlength="30" required="required" />
			</div>
			<div>
				<input name="mail" type="mail" value="<?php $plxShow->comGet('mail', ''); ?>" placeholder="<?php $plxShow->lang('EMAIL') ?>" />
			</div>
			<div>
				<input name="site" type="text" value="<?php $plxShow->comGet('site', ''); ?>" placeholder="<?php $plxShow->lang('WEBSITE') ?>" />
			</div>
			<div>
				<p class="sender"><?php $plxShow->lang('REPLY_TO'); ?> :</p>
				<blockquote id="id_answer" class="sender"></blockquote>
				<textarea name="content" rows="6" placeholder="<?php $plxShow->lang('COMMENT'); ?>" required><?php $plxShow->comGet('content',''); ?></textarea>
			</div>
		</fieldset><fieldset>
			<?php $plxShow->comMessage('<p id="com_message" class="#com_class"><strong>#com_message</strong></p>'); ?>
<?php
	if($plxShow->plxMotor->aConf['capcha']) {
?>
				<div class="capcha">
					<div><label for="id_rep"><?php echo $plxShow->lang('ANTISPAM_WARNING') ?>&nbsp;:</label></div>
					<div><?php $plxShow->capchaQ(); ?></div>
					<input name="rep" type="text" maxlength="1" required />
				</div>

<?php
	}
?>
				<div>
					<input type="hidden" name="parent" value="<?php $plxShow->comGet('parent', ''); ?>" />
					<input type="reset" name="reset" value="<?php $plxShow->lang('CANCEL'); ?>" class="sender" />
					<input type="submit" value="<?php $plxShow->lang('SEND') ?>" />
				</div>
		</fieldset>
	</form>

	<script> <!-- Thème Facbook : gestion commentaires -->
	(function() {
		'use strict';

		const comments = document.getElementById('coms-list');

		if(comments == null) { return; }

		const form1 = document.forms.form1;
		const answer = document.getElementById('id_answer');
		comments.addEventListener('click', function(event) {
			if(event.target.hasAttribute('data-com')) {
				event.preventDefault();
				const comId = event.target.dataset.com;
				const source = document.getElementById('com-' + comId);
				document.getElementById('id_answer').innerHTML = source.innerHTML;
				form1.elements.parent.value = comId;
				form1.classList.add('response');
				form1.scrollIntoView({behavior: 'smooth'});
				form1.elements.name.focus();
			}
		});

		form1.elements.reset.onclick = function(event) {
			event.target.form.classList.remove('response');
			document.getElementById('top').scrollIntoView({behavior: 'smooth'});
		}
	})();
	</script>
	<p class="rss"><?php $plxShow->comFeed(true, $plxShow->artId()); ?></p>
<?php
} else {
?>
	<p><?php $plxShow->lang('COMMENTS_CLOSED') ?>.</p>
<?php
} # Fin du if sur l'autorisation des commentaires
?>
