<?php
/**
 * @package   AkeebaEngage
 * @copyright Copyright (c)2020-2022 Nicholas K. Dionysopoulos / Akeeba Ltd
 * @license   GNU General Public License version 3, or later
 */

namespace Akeeba\Engage\Admin\Helper;


use FEFHelperBrowse;
use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;

final class Grid
{
	/**
	 * Returns a published state on a grid
	 *
	 * @param   integer       $value         The state value.
	 * @param   integer       $i             The row index
	 * @param   string|array  $prefix        An optional task prefix or an array of options
	 * @param   boolean       $enabled       An optional setting for access control on the action.
	 * @param   string        $checkbox      An optional prefix for checkboxes.
	 * @param   string        $publish_up    An optional start publishing date.
	 * @param   string        $publish_down  An optional finish publishing date.
	 *
	 * @return  string  The HTML markup
	 *
	 * @see     HTMLHelperJGrid::state()
	 * @since   1.6
	 */
	public static function published($value, $i, $prefix = '', $enabled = true, $checkbox = 'cb', $publish_up = null, $publish_down = null)
	{
		if (is_array($prefix))
		{
			$options  = $prefix;
			$enabled  = array_key_exists('enabled', $options) ? $options['enabled'] : $enabled;
			$checkbox = array_key_exists('checkbox', $options) ? $options['checkbox'] : $checkbox;
			$prefix   = array_key_exists('prefix', $options) ? $options['prefix'] : '';
		}

		/**
		 * Format:
		 *
		 * (task, text, active title, inactive title, tip (boolean), active icon class (without akion-), inactive icon class (without akion-))
		 */
		$states = [
			1  => ['unpublish', 'JPUBLISHED', 'JLIB_HTML_UNPUBLISH_ITEM', 'JPUBLISHED', true, '--green checkmark', '--green checkmark'],
			0  => ['publish', 'JUNPUBLISHED', 'JLIB_HTML_PUBLISH_ITEM', 'JUNPUBLISHED', true, '--red close', '--red close'],
			2  => ['unpublish', 'JARCHIVED', 'JLIB_HTML_UNPUBLISH_ITEM', 'JARCHIVED', true, '--orange ion-ios-box', '--orange ion-ios-box'],
			-2 => ['publish', 'JTRASHED', 'JLIB_HTML_PUBLISH_ITEM', 'JTRASHED', true, '--dark trash-a', '--dark trash-a'],
			-3 => [
				'publish', 'COM_ENGAGE_COMMENTS_STATE_SPAM', 'JLIB_HTML_PUBLISH_ITEM', 'COM_ENGAGE_COMMENTS_STATE_SPAM',
				true, 'ios-flag', 'ios-flag',
			],
		];

		// Special state for dates
		if ($publish_up || $publish_down)
		{
			$nullDate = Factory::getDbo()->getNullDate();
			$nowDate  = Factory::getDate()->toUnix();

			$tz = Factory::getUser()->getTimezone();

			$publish_up   = (!empty($publish_up) && ($publish_up != $nullDate)) ? Factory::getDate($publish_up, 'UTC')->setTimeZone($tz) : false;
			$publish_down = (!empty($publish_down) && ($publish_down != $nullDate)) ? Factory::getDate($publish_down, 'UTC')->setTimeZone($tz) : false;

			// Create tip text, only we have publish up or down settings
			$tips = [];

			if ($publish_up)
			{
				$tips[] = Text::sprintf('JLIB_HTML_PUBLISHED_START', HTMLHelper::_('date', $publish_up, Text::_('DATE_FORMAT_LC5'), 'UTC'));
			}

			if ($publish_down)
			{
				$tips[] = Text::sprintf('JLIB_HTML_PUBLISHED_FINISHED', HTMLHelper::_('date', $publish_down, Text::_('DATE_FORMAT_LC5'), 'UTC'));
			}

			$tip = empty($tips) ? false : implode('<br />', $tips);

			// Add tips and special titles
			foreach ($states as $key => $state)
			{
				// Create special titles for published items
				if ($key == 1)
				{
					$states[$key][2] = $states[$key][3] = 'JLIB_HTML_PUBLISHED_ITEM';

					if (!empty($publish_up) && ($publish_up > $nullDate) && ($nowDate < $publish_up->toUnix()))
					{
						$states[$key][2] = $states[$key][3] = 'JLIB_HTML_PUBLISHED_PENDING_ITEM';
						$states[$key][5] = $states[$key][6] = 'android-time';
					}

					if (!empty($publish_down) && ($publish_down > $nullDate) && ($nowDate > $publish_down->toUnix()))
					{
						$states[$key][2] = $states[$key][3] = 'JLIB_HTML_PUBLISHED_EXPIRED_ITEM';
						$states[$key][5] = $states[$key][6] = 'alert';
					}
				}

				// Add tips to titles
				if ($tip)
				{
					$states[$key][1] = Text::_($states[$key][1]);
					$states[$key][2] = Text::_($states[$key][2]) . '<br />' . $tip;
					$states[$key][3] = Text::_($states[$key][3]) . '<br />' . $tip;
					$states[$key][4] = true;
				}
			}

			return HTMLHelper::_('FEFHelp.browse.state', $states, $value, $i, [
				'prefix' => $prefix, 'translate' => !$tip,
			], $enabled, true, $checkbox);
		}

		return HTMLHelper::_('FEFHelp.browse.state', $states, $value, $i, $prefix, $enabled, true, $checkbox);
	}

}
