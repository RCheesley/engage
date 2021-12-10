<?php
/**
 * @package   AkeebaEngage
 * @copyright Copyright (c)2020-2021 Nicholas K. Dionysopoulos / Akeeba Ltd
 * @license   GNU General Public License version 3, or later
 */

namespace Joomla\Plugin\User\Engage\Extension;

defined('_JEXEC') or die;

use Akeeba\Component\Engage\Administrator\Helper\UserFetcher;
use Akeeba\Component\Engage\Site\Helper\Meta;
use Exception;
use Joomla\CMS\Application\CMSApplication;
use Joomla\CMS\Component\ComponentHelper;
use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\CMS\User\User;
use Joomla\CMS\User\UserHelper;
use Joomla\Database\DatabaseDriver;
use Joomla\Event\DispatcherInterface;
use Joomla\Utilities\ArrayHelper;

class Engage extends CMSPlugin
{
	/**
	 * Affects constructor behavior. If true, language files will be loaded automatically.
	 *
	 * @var    boolean
	 * @since  3.0.0
	 */
	protected $autoloadLanguage = true;

	/**
	 * Joomla's database driver (auto-assigned on class instantiation)
	 *
	 * @var   DatabaseDriver
	 * @since 1.0.0.b3
	 */
	protected $db;

	/**
	 * The current application
	 *
	 * @var   CMSApplication
	 * @since 3.0.0
	 */
	protected $app;

	/**
	 * Should this plugin be allowed to run?
	 *
	 * If the runtime dependencies are not met the plugin effectively self-disables even if it's published. This
	 * prevents a WSOD should the user e.g. uninstall a library or the component without unpublishing the plugin first.
	 *
	 * @var  bool
	 */
	private $enabled = true;

	/**
	 * Cache the user objects to remove
	 *
	 * @var User[]
	 */
	private $usersToRemove = [];

	/**
	 * Constructor
	 *
	 * @param   DispatcherInterface  &$subject  The object to observe
	 * @param   array                 $config   An optional associative array of configuration settings.
	 *
	 * @return  void
	 */
	public function __construct(&$subject, $config = [])
	{
		if (!ComponentHelper::isEnabled('com_engage'))
		{
			$this->enabled = false;
		}

		parent::__construct($subject, $config);
	}

	/**
	 * Remove all user profile information for the given user ID
	 *
	 * Method is called after user data is deleted from the database
	 *
	 * @param   array        $user     Holds the user data
	 * @param   bool         $success  True if user was successfully stored in the database
	 * @param   string|null  $msg      Message
	 *
	 * @return  bool
	 *
	 * @throws  Exception
	 */
	public function onUserAfterDelete(array $user, bool $success = true, ?string $msg = null): bool
	{
		// Make sure we can actually run
		if (!$this->enabled)
		{
			return true;
		}

		// Get the user ID; fail if it's not available
		$userId = ArrayHelper::getValue($user, 'id', 0, 'int');

		if (!$userId)
		{
			return true;
		}

		// Make sure we've seen this user ID before
		if (array_key_exists($userId, $this->usersToRemove))
		{
			return true;
		}

		// If Joomla reported failure to remove the user we don't remove the comments.
		if (!$success)
		{
			unset($this->usersToRemove[$userId]);

			return true;
		}

		// Remove the comments and uncache the user object.
		$this->app->getLanguage()->load('com_engage', JPATH_ADMINISTRATOR);
		$this->app->getLanguage()->load('com_engage', JPATH_SITE);

		Meta::pseudonymiseUserComments($this->usersToRemove[$userId], true);

		unset($this->usersToRemove[$userId]);

		return true;
	}

	/**
	 * Remove all user profile information for the given user ID.
	 *
	 * Method is called before user data is deleted from the database. We use it to cache the user object so we can use
	 * it onUserAfterDelete when the user object is no longer available through the Joomla API.
	 *
	 * @param   array  $user  Holds the user data
	 *
	 * @return  bool
	 *
	 * @throws  Exception
	 */
	public function onUserBeforeDelete($user): bool
	{
		// Make sure we can actually run
		if (!$this->enabled)
		{
			return true;
		}

		// Get the user ID; fail if it's not available
		$userId = ArrayHelper::getValue($user, 'id', 0, 'int');

		if (!$userId)
		{
			return true;
		}

		// Get and verify the user object
		$userObject = UserFetcher::getUser($userId);

		if ($userObject->id != $userId)
		{
			return true;
		}

		// Cache the user object
		$this->usersToRemove[$userId] = clone $userObject;

		return true;
	}

	/**
	 * This method should handle any login logic and report back to the subject
	 *
	 * @param   array  $user     Holds the user data
	 * @param   array  $options  Array holding options (remember, autoregister, group)
	 *
	 * @return  boolean  True on success
	 *
	 * @since   1.0.0.b3
	 */
	public function onUserLogin(array $user, array $options = []): bool
	{
		// Is the “Own guest comments on login“ option enabled?
		if ($this->params->get('own_comments', 1) != 1)
		{
			return true;
		}

		// Can we find a user ID?
		$id = (int) UserHelper::getUserId($user['username']);

		if ($id <= 0)
		{
			return true;
		}

		// Load the user object and own the comments
		$userObject = User::getInstance();

		$userObject->load($id);
		$this->ownComments($userObject);

		return true;
	}

	/**
	 * Allow the specified user to own the comments they filed as a guest under the same email address
	 *
	 * @param   User  $user
	 *
	 * @return  void
	 */
	private function ownComments(User $user): void
	{
		// Sanity check
		if ($user->guest || ($user->id <= 0) || empty($user->email))
		{
			return;
		}

		// Run a simple update query to let the user own the comments
		$db = $this->db;

		$query = $db->getQuery(true)
			->update($db->qn('#__engage_comments'))
			->set([
				$db->qn('name') . ' = NULL',
				$db->qn('email') . ' = NULL',
				$db->qn('created_by') . ' = ' . $user->id,
			])
			->where($db->qn('email') . ' = ' . $db->q($user->email))
			->where($db->qn('created_by') . ' = 0');

		try
		{
			$db->setQuery($query)->execute();
		}
		catch (Exception $e)
		{
			// No problem if this fails.
		}
	}
}