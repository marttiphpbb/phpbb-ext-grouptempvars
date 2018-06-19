<?php
/**
* phpBB Extension - marttiphpbb grouptempvars
* @copyright (c) 2015 - 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\grouptempvars\event;

use phpbb\event\data as event;
use phpbb\db\driver\factory as db;
use phpbb\user;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class listener implements EventSubscriberInterface
{
	protected $db;
	protected $user;
	protected $user_group_table;

	public function __construct(
		db $db,
		user $user,
		string $user_group_table
	)
	{
		$this->db = $db;
		$this->user = $user;
		$this->user_group_table = $user_group_table;
	}

	static public function getSubscribedEvents()
	{
		return [
			'core.twig_environment_render_template_before'
				=> 'core_twig_environment_render_template_before',
		];
	}

	public function core_twig_environment_render_template_before(event $event)
	{
		$context = $event['context'];

		$user_id = $this->user->data['user_id'];

		$grouptempvars = [];

		$sql = 'select group_id
			from ' . $this->user_group_table . '
			where user_id = ' . $user_id . '
				and user_pending = 0';

		$result = $this->db->sql_query($sql);

		while ($group_id = $this->db->sql_fetchfield('group_id'))
		{
			$grouptempvars[$group_id] = true;
			$context['S_GROUP_' . $group_id] = true;
		}

		$this->db->sql_freeresult($result);

		$context['marttiphpbb_grouptempvars'] = $grouptempvars;

		$event['context'] = $context;
	}
}
