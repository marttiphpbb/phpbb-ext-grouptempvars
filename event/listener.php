<?php
/**
* phpBB Extension - marttiphpbb grouptempvars
* @copyright (c) 2015 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\grouptempvars\event;

use phpbb\db\driver\factory as db;
use phpbb\template\twig\twig as template;
use phpbb\user;

/**
* @ignore
*/
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
* Event listener
*/
class listener implements EventSubscriberInterface
{
	/* @var db */
	protected $db;

	/* @var template */
	protected $template;

	/* @var user */
	protected $user;

	/**
	 * @param db $db
	 * @param template $template
	 * @param user $user
	*/
	public function __construct(
		db $db,
		template $template,
		user $user
	)
	{
		$this->db = $db;
		$this->template = $template;
		$this->user = $user;
	}

	static public function getSubscribedEvents()
	{
		return array(
			'core.page_footer'		=> 'core_page_footer',
		);
	}

	public function core_page_footer($event)
	{
		$template_vars = array();
		$user_id = $this->user->data['user_id'];

		$sql = 'SELECT group_id 
			FROM ' . USER_GROUP_TABLE . '
			WHERE user_id = ' . $user_id . '
				AND user_pending = 0';

		$result = $this->db->sql_query($sql);

		while ($group_id = $this->db->sql_fetchfield('group_id'))
		{
			$template_vars['S_GROUP_' . $group_id] = true;
		}

		$this->db->sql_freeresult($result);

		if (sizeof($template_vars))
		{
			$this->template->assign_vars($template_vars);
		}
	}
}
