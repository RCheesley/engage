<?php
/**
 * @package   AkeebaEngage
 * @copyright Copyright (c)2020-2022 Nicholas K. Dionysopoulos / Akeeba Ltd
 * @license   GNU General Public License version 3, or later
 */

defined('_JEXEC') or die();

/**
 * View Template for the submitting new comments or replies to existing comments
 *
 * Called from default.php
 */

use Joomla\CMS\Editor\Editor;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;

/** @var \Akeeba\Engage\Site\View\Comments\Html $this */

$captcha = $this->getCaptchaField();
$badUx   = $this->container->params->get('comments_reply_bad_ux', 0) == 1;
$badUx   = $badUx && empty(trim(strip_tags($this->storedComment)));

HTMLHelper::_('behavior.formvalidator');
?>
<?php if ($badUx): ?>
<div class="akengage-comment-hider" id="akengage-comment-hider">
	<div class="btn-group">
		<button type="button"
				id="akengage-comment-hider-button"
				class="btn btn-primary">
			<?= Text::_('COM_ENGAGE_COMMENTS_FORM_HEADER'); ?>
		</button>
	</div>
</div>
<?php endif; ?>
<div class="akengage-comment-form" id="akengage-comment-form" <?= $badUx ? 'style="display: none"' : ''; ?> >
	<h4>
		<?= Text::_('COM_ENGAGE_COMMENTS_FORM_HEADER'); ?>
	</h4>

	<?= $this->container->template->loadPosition('engage-before-reply'); ?>

	<form class="form-horizontal form-validate"
		  action="<?= Route::_('index.php?option=com_engage&view=Comments', true, Route::TLS_IGNORE, true) ?>"
		  method="post" name="akengageCommentForm"
		  id="akengageCommentForm">
		<input type="hidden" name="task" value="submit">
		<input type="hidden" name="<?= $this->container->platform->getToken(true); ?>" value="1">
		<input type="hidden" name="asset_id" value="<?= (int) $this->assetId; ?>">
		<input type="hidden" name="parent_id" value="0">
		<input type="hidden" name="returnurl" value="<?= base64_encode(Uri::getInstance()->toString()); ?>">

		<div id="akengage-comment-inreplyto-wrapper">
			<?= Text::_('COM_ENGAGE_COMMENTS_FORM_INREPLYTO_LABEL'); ?>
			<span id="akengage-comment-inreplyto-name">Some User</span>
			<button id="akengage-comment-inreplyto-cancel"
					type="button"
			><?= Text::_('COM_ENGAGE_COMMENTS_FORM_CANCELREPLY'); ?></button>
		</div>

		<?php if ($this->user->guest): ?>
			<div class="control-group">
				<div class="control-label">
					<label for="akengage-comment-form-name"
						   class="required"
					>
						<?= Text::_('COM_ENGAGE_COMMENTS_FORM_NAME_LABEL'); ?>
						<span class="star">&nbsp;*</span>
					</label>
				</div>
				<div class="controls">
					<input type="text" name="name" id="akengage-comment-form-name"
						   value="<?= $this->escape($this->storedName); ?>" class="inputbox required"
						   required="required"
						   aria-required="true" aria-invalid="false"
						   placeholder="<?= Text::_('COM_ENGAGE_COMMENTS_FORM_NAME_PLACEHOLDER'); ?>"
						   size="30">
				</div>
			</div>

			<div class="control-group">
				<div class="control-label">
					<label for="akengage-comment-form-email"
						   class="required"
					>
						<?= Text::_('COM_ENGAGE_COMMENTS_FORM_EMAIL_LABEL'); ?>
						<span class="star">&nbsp;*</span>
					</label>
				</div>
				<div class="controls">
					<input type="email" name="email" id="akengage-comment-form-email"
						   value="<?= $this->escape($this->storedEmail); ?>"
						   class="inputbox required"
						   required="required"
						   aria-required="true" aria-invalid="false"
						   placeholder="<?= Text::_('COM_ENGAGE_COMMENTS_FORM_EMAIL_PLACEHOLDER'); ?>"
						   size="30">
				</div>
			</div>

			<div class="control-group">
				<div class="controls">
					<label for="akengage-comment-form-saveinfo" class="checkbox">
						<input type="checkbox" id="akengage-comment-form-saveinfo"
							   name="akengage-comment-form-saveinfo">
						<?= Text::_('COM_ENGAGE_COMMENTS_FORM_REMEMBERME') ?>
					</label>
				</div>
			</div>

			<?php if ($this->container->params->get('tos_accept', 0)): ?>
			<div class="control-group">
				<div class="controls">
					<label for="akengage-comment-form-accept-tos" class="checkbox">
						<input type="checkbox" id="akengage-comment-form-accept-tos"
							   name="accept_tos">
						<?= $this->getCheckboxText() ?>
					</label>
				</div>
			</div>
			<?php endif; ?>

		<?php endif; ?>

		<?= Editor::getInstance($this->container->platform->getConfig()->get('editor', 'tinymce'))
			->display('comment', $this->storedComment, '100%', '400', 50, 10, false, 'akengage-comment-editor'); ?>

		<?php if (!(empty($captcha))): ?>
			<div class="akengage-comment-captcha-wrapper">
				<?= $captcha; ?>
			</div>
			<div class="akengage-comment-captcha-clear"></div>
		<?php endif; ?>

		<div class="clearfix"></div>

		<div class="btn-group">
			<button type="submit" class="btn btn-primary">
				<?= Text::_('COM_ENGAGE_COMMENTS_FORM_BTN_SUBMIT'); ?>
			</button>
		</div>
	</form>

	<?= $this->container->template->loadPosition('engage-after-reply'); ?>
</div>