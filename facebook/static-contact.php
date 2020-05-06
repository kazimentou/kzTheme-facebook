<?php
if (!defined('PLX_ROOT')) exit;

if(filter_has_var(INPUT_POST, 'mail')) {
	plxToken::validateFormToken($_POST);
}
?>

<?php include __DIR__.'/header.php'; ?>

	<main class="main">

		<div class="container">

			<div class="grid">

				<div class="content col sml-12 med-9">

					<article class="article static" id="static-page-<?php echo $plxShow->staticId(); ?>">

						<header>
							<h2>
								<?php $plxShow->staticTitle(); ?>
							</h2>
						</header>

						<?php $plxShow->staticContent(); ?>

					</article>

					<form id="form-contact" method="post">

						<fieldset>

							<div class="grid">
								<div class="col sml-12">
									<label for="id_name"><?php $plxShow->lang('NAME') ?>* :</label>
									<input id="id_name" name="name" type="text" size="20" value="" maxlength="30" required />
								</div>
							</div>
							<div class="grid">
								<div class="col sml-12 lrg-6">
									<label for="id_mail"><?php $plxShow->lang('EMAIL') ?> :</label>
									<input id="id_mail" name="mail" type="mail" size="20" value="" required />
								</div>
								<div class="col sml-12 lrg-6">
									<label for="id_site"><?php $plxShow->lang('WEBSITE') ?> :</label>
									<input id="id_site" name="site" type="text" size="20" value="" />
								</div>
							</div>
							<div class="grid">
								<div class="col sml-12">
									<div id="id_answer"></div>
									<label for="id_content" class="lab_com"><?php $plxShow->lang('COMMENT') ?>* :</label>
									<textarea id="id_content" name="content" cols="35" rows="6" required></textarea>
								</div>
							</div>

							<?php $plxShow->comMessage('<p id="com_message" class="#com_class"><strong>#com_message</strong></p>'); ?>

							<?php if($plxShow->plxMotor->aConf['capcha']): ?>
<?php $plxShow->plxMotor->plxCapcha = new plxCapcha(); ?>
							<div class="grid">
								<div class="col sml-12">
									<label for="id_rep"><strong><?php echo $plxShow->lang('ANTISPAM_WARNING') ?></strong>*</label>
									<?php $plxShow->capchaQ(); ?>
									<input id="id_rep" name="rep" type="text" size="2" maxlength="1" style="width: auto; display: inline;" required="required" />
								</div>
							</div>

							<?php endif; ?>

							<div class="grid">
								<div class="col sml-12">
									<?php echo plxToken::getTokenPostMethod() ?>
									<input class="blue" type="submit" value="<?php $plxShow->lang('SEND') ?>" />
								</div>
							</div>

						</fieldset>

					</form>

				</div>

				<?php include __DIR__.'/sidebar.php'; ?>

			</div>

		</div>

	</main>

<?php include __DIR__.'/footer.php'; ?>
