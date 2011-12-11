<?php

/**
 * Copyright (C) 2011	Grummfy
 *
 * This program is free software: under GPLv3, see doc/LICENCE.txt
 * for more informations or go to http://www.gnu.org/licenses/
 */

namespace GitChangeLogManifier;

/**
 * @see http://www.fire-soft-board.com/~wiki/fsb2:git:accueil#message_de_commit
 */
class ChangeLog_Datas_FSB_FSB extends ChangeLog_Datas_AbstractProcessor
{
	const LOG_TICKET_PATTERN = 'FSB_(?:(B|F)_)?T#(\d+)(?:-(\d+))?';

	public function getPattern()
	{
		return self::LOG_TICKET_PATTERN;
	}

	protected function _getLineKey()
	{
		return 'FSB_topic';
	}

	protected function _getDataFactory()
	{
		return __NAMESPACE__ . '\\ChangeLog_Datas_FSB_Topic::factory';
	}
}

# EOF
