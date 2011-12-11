<?php

/**
 * Copyright (C) 2011	Grummfy
 *
 * This program is free software: under GPLv3, see doc/LICENCE.txt
 * for more informations or go to http://www.gnu.org/licenses/
 */

namespace GitChangeLogManifier;

class ChangeLog_Datas_Github_Github extends ChangeLog_Datas_AbstractProcessor
{
	const LOG_TICKET_PATTERN = '(?:(Closes[ ]+#| #)(\d+))';

	public function getPattern()
	{
		return self::LOG_TICKET_PATTERN;
	}

	protected function _getLineKey()
	{
		return 'github_ticket';
	}

	protected function _getDataFactory()
	{
		return __NAMESPACE__ . '\\ChangeLog_Datas_Github_Issue::factory';
	}
}

# EOF